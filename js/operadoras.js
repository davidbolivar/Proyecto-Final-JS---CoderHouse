let operators_div = document.getElementById("operadoras");
let cards_div = document.getElementById("tarjetas_operadoras");

// Pantilla de tarjeta para operadoras en operadoras.html
let operator_card_template = (operator) => {
	let min, max, hidden;
	let ref = services_[operator];

	if (operator == "inter_postpago") hidden = "hidden";

	if (ref.min === null) min = ref.min_text;
	else min = ref.min + " Bs";

	if (ref.max === null) max = ref.max_text;
	else max = ref.max + " Bs";

	return `<div id="${operator}" class="col">
		<div class="card rounded-0 border-dark shadow-sm">
			<div class="card-img-top bg-light">
				<img src="${ref.image}" height="40px" alt="Logo ${ref.name}" />
			</div>
			<div class="bg-secondary text-white m-auto w-100 text-center"> ${ref.name} > ${ref.contract.es}</div>
			<div class="card-body">
				<p class="card-text">
					<strong>Recarga mínima:</strong> ${min}
				</p>
				<p class="card-text" ${hidden}>
					<strong>Racarga máxima:</strong> ${max}
				</p>
				<p class="card-text" ${hidden}>
					<strong>Multiplos de:</strong> ${ref.multiple}
				</p>
                <p class="small small text-muted mt-1" ${hidden}>
					<strong>Ejemplo:</strong>  ${ref.amounts[0]} Bs / ${ref.amounts[1]} Bs / ${ref.amounts[2]} Bs
				</p>
				<button type="button" class="mt-3 btn btn-${ref.class} rounded-0 col-12">
					${ref.labels.send_button}
				</button>
			</div>
		</div>
	</div>`;
};

// Por cada operadora inserta una tarjeta y agrega un listener a los botones
for (const service in services_) {
	tarjetas_operadoras.insertAdjacentHTML("beforeend", operator_card_template(service));

	document.querySelector(`#${service} button`).addEventListener("click", () => {
		card_listener(service);
	});
}

// Al detectar el evento click, se limpia el formulario, se elige operadora seleccionada
//  se cambian los montos de recarga y se simula un click al botón de enviar
function card_listener(service_name) {
	rechargeForm.reset();
	location.href = "#recharge_form";
	setTimeout(() => {
		service.value = service_name;
		addAmountOptions(amount, services_[service_name].amounts, "Monto a recargar");
		amount.disabled = false;
		sendButton.click();
	}, 1000);
}
