// Declaración de variables para envío de formulario por whatsapp
const rechargeForm = document.getElementById("recharge_form");
const service = rechargeForm.elements.service;
const amount = rechargeForm.elements.amount;
const target = rechargeForm.elements.target;
const sendButton = rechargeForm.elements.send_button;
const getDolarButton = document.getElementById("get_dolar");

document.addEventListener("DOMContentLoaded", function () {
	// Animaciones al cargar el sitio
	// Es lo único que se hace con JQUERY.
	$(".header")
		.slideUp(0)
		.slideDown(1000, () => {
			$("#recharge_form").fadeOut(50).fadeIn(150).fadeOut(50).fadeIn(150).fadeOut(50).fadeIn(1000);
		});

	loadServices();

	service.onchange = () => {
		const interface = new ui();
		interface.onChangeService();
	};

	// Listener para detectar envío del formulario
	recharge_form.onsubmit = (event) => {
		// Cancela el comportamiento por defecto del formulario.
		event.preventDefault();

		// Preguntamos al usuario si quiere confirmar su solicitud para ser atendido por un asesor
		// Si el usuario confirma que desea continuar, se crea el objeto de la clase request
		// Se envía por whatsapp, se guarda en local storage y se muestra la información actualizada.

		Swal.fire({
			title: "VERIFICA LOS DATOS INGRESADOS",
			html: `
				<p class="text-principal"><b>${rechargeForm["service"].value.toUpperCase().replace(/_/g, " ")} - ${rechargeForm["amount"].value} Bs - ${rechargeForm["target"].value}</b></p>
				<p class="mb-0 mt-3"><b>¿Deseas continuar?</b></p>
				<p class="small">Serás redirigido a Whatsapp y uno de nuestros asesores te indicará como realizar el pago.</p>`,
			icon: "info",
			showCancelButton: true,
			confirmButtonColor: "#293c7d",
			cancelButtonColor: "#6C757E",
			confirmButtonText: "Continuar",
			cancelButtonText: "Cancelar",
			reverseButtons: true,
			backdrop: "#293c7de3",
		}).then((result) => {
			if (result.isConfirmed) {
				const request = new recharge(service.value, amount.value, target.value);
				request.send();
				request.save_request();
				show_last_request();
			}
		});
	};

	show_last_request();
});

//AGREGA LOS MONTOS AL SELECT (campo,valores,opción seleccionada)
function addAmountOptions(field, values, selected) {
	// console.log(field);

	field.length = 0;
	field.options[0] = new Option(selected, "");
	field.options[0].hidden = true;
	field.selectedIndex = 0;

	for (let i = 0; i < values.length; i++) {
		// Monto de recarga
		let value = values[i];
		// Total a pagar
		let total = Number(values[i] * 1.15)
			.toFixed(2)
			.replace(".", ",");

		field.options[field.length] = new Option(value + " Bs - Pagas: " + total + " Bs", value);
	}
}

//AGREGA OPCIONES A SELECTS (campo,nombre,value,selected)
function addServicesOptions(field, name, value, selected) {
	// Si selected tiene un valor, se limpia el select y se agrega como primera opción oculta
	if (selected) {
		field.length = 0;
		field.options[field.length] = new Option(name, value);
		field.options[field.length - 1].hidden = true;
		field.selectedIndex = 0;
		// Si selected no tiene valor, se agregan opciones al select sin limpiarlo.
	} else {
		field.options[field.length] = new Option(name, value);
		console.log(services_[value].active);
		// Si el servicio está marcado como inactivo, lo desactivamos.
		if (!services_[value].active) field.options[field.length - 1].disabled = true;
		// Si el servicio tiene un status, lo mostramos.
		if (services_[value].status != "") field.options[field.length - 1].innerText += ` (${services_[value].status})`;
	}
}

// CARGA LA COFIGURACIÓN DE LA PÁGINA
function loadServices() {
	// Ordenamos alfabéticamente la lista de servicios antes de agregarlos al select
	const ordered_services = Object.keys(services_)
		.sort()
		.reduce((obj, key) => {
			obj[key] = services_[key];
			return obj;
		}, {});

	// Agregamos la primera opción para el select de sercicios.
	addServicesOptions(service, "Seleccione un servicio", "", true);
	// Por cada servicio, agregamos una nueva opción
	for (let item in ordered_services) addServicesOptions(service, ordered_services[item].name, item, false);
}

// Si existen datos del último pago o recarga en localStorage
// los muestra en un div debajo del formulario de recarga.
function show_last_request() {
	let data = JSON.parse(localStorage.getItem("last_request"));
	if (data) {
		let last_request_div = document.getElementById("last_request");
		if (last_request_div) last_request_div.remove();
		let div = `<div id="last_request" class="p-2 alert alert-info text-center"><strong>Datos de su última solicitud:</strong> ${data.service} - ${data.target} - ${data.amount} Bs</div>`;

		recharge_form.insertAdjacentHTML("afterend", div);
	}
}

// Petición GET a API de Dolar Today que se activa con click a #get_dolar
get_dolar.onclick = () => {
	const url = "https://s3.amazonaws.com/dolartoday/data.json";

	fetch(url)
		.then((resp) => resp.json())
		.then(function (respuesta) {
			console.log(respuesta.USD.dolartoday);
			Swal.fire({ icon: "success", title: "Cotización USD", html: `<span class="font-weight-bold text-success">1 USD = Bs. ${respuesta.USD.dolartoday} </span>`, confirmButtonText: "Cerrar", scrollbarPadding: false });
		})
		.catch(function (error) {
			console.log(error);
		});
};

class recharge {
	constructor(service, amount, target) {
		this.service = service;
		this.amount = amount;
		this.target = target;
	}

	// Envía la solicitud por whatsapp
	send() {
		window.open(`${config_.whatsapp.url}?text=*¡Hola!* Me interesa realizar una recarga *${services_[this.service].name}* por *${this.amount} Bs* al número *${this.target}*.`, "_blank", "noopener");
		rechargeForm.reset();
	}

	// Guarda los datos del pago o recarga en localStorage
	save_request() {
		let data = { service: services_[this.service].name, amount: this.amount, target: this.target };
		localStorage.clear();
		localStorage.setItem("last_request", JSON.stringify(data));
	}
}

class ui {
	// Cambia los montos a recargar
	onChangeService() {
		addAmountOptions(amount, services_[service.value].amounts, "Monto a recargar");
		amount.disabled = false;
		target.value = "";
		target.placeholder = services_[service.value].labels.target;
		sendButton.value = services_[service.value].labels.send_button;
	}
}
