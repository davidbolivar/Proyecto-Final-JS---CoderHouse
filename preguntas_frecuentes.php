<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16" />
		<link rel="stylesheet" href="librerias/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="css/estilos.css" />
		<title>Preguntas frecuentes - <?php echo __DISPLAY_NAME__; ?></title>

		<meta name="title" content="Preguntas frecuentes - <?php echo __DISPLAY_NAME__; ?>" />
		<meta name="description" content="Encuentra respuesta a las preguntas más frecuentes que tienen nuestros usuarios." />
		<meta name="keywords" content="recargas, saldo, dudas, preguntas, información" />
		<meta name="robots" content="index, follow" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="Spanish" />
		<meta name="revisit-after" content="2 days" />
		<meta name="author" content="DB" />

		<!-- Open Graph data -->
        <?php include 'includes/open-graph-data.php'; ?>

		<!-- No chache -->
		<?php include 'includes/no-cache.php'; ?>
	</head>

	<body>
		<h1 hidden>Preguntas frecuentes - <?php echo __DISPLAY_NAME__; ?></h1>

		<!-- NAVBAR -->
		<?php include 'includes/navbar.php'; ?>

		<!-- HEADER -->
		<header id="header" class="header">
			<div class="header__banner header__banner--preguntas-frecuentes"></div>

			<!-- FORMUALRIO RECARGAR -->
            <?php include 'includes/formulario-recargar.php'; ?>
		</header>

		<!-- MAIN -->
		<main>
			<!-- PREGUNTAS FRECUENTES -->
			<section id="preguntas-frecuentes">
				<h2>Preguntas frecuentes</h2>

				<ul>
					<li>
						<h3><img class="icons" src="assets/img/check.svg" alt="Icono de check" />¿Hay un monto mínimo para recargar?</h3>
						<p>Los montos de recarga mínimo y máximo son establecidos por cada operadora y estos pueden cambiar con frecuencia. Al completar el formulario de recarga, podrás ver los montos habilitados.</p>
					</li>

					<li>
						<h3><img class="icons" src="assets/img/check.svg" alt="Icono de check" />¿Cómo puedo saber el estado de mi recarga?</h3>
						<p>Te notificaremos por Whatsapp cuando tu recarga haya sido procesada y te enviaremos un comprobante. Recuerda que para que podamos avanzar con tus solicitudes debes enviar el comprobante de pago.</p>
					</li>

					<li>
						<h3><img class="icons" src="assets/img/check.svg" alt="Icono de check" /> ¿Tiene algún costo el servicio?</h3>
						<p>Si, además del valor de la recarga que solcites debes pagar una comisión por el servicio. El monto total a pagar te lo enviaremos cuando solicites tu recarga.</p>
					</li>

					<li>
						<h3><img class="icons" src="assets/img/check.svg" alt="Icono de check" /> ¿En cuánto tiempo se acredita mi recarga?</h3>
						<p>El tiempo promedio de acreditación es de 10 minutos. El horario de acreditación es de 08:00 de la mañana a 10:00 de la noche.</p>
					</li>

					<li>
						<h3><img class="icons" src="assets/img/check.svg" alt="Icono de check" /> ¿Qué necesito para utilizar este servicio?</h3>
						<p>
							Debes tener instalado Whatsapp en tu teléfono celular o computador ya que una vez que solicites tus recargas el proceso continúa por esa vía.
							<a href="https://www.xataka.com/basics/como-utilizar-whatsapp-web-para-utilizar-whatsapp-desde-tu-navegador">Clic aquí para ver como utilizar Whatsapp en tu computadora.</a>
						</p>
						<a href="https://www.youtube.com/watch?v=eRqreOyBJfI" target="_blank" rel="noopener" aria-label="Video sobre como utilizar whatsapp en copmutador.">
						<picture>
							<source media="(min-width:576px)" srcset="assets/img/video-whatsapp.jpg" />
							<img src="assets/img/video-whatsapp-sm.jpg" alt="Video sobre como utilizar whatsapp en copmutador." />
						</picture>
					</li>
					</a>
				</ul>
			</section>
		</main>

		<!-- FOOTER -->
		<?php include 'includes/footer.php'; ?>

		<script src="librerias/bootstrap/js/bootstrap.min.js"></script>
		<script src="js/config.js"></script>
		<script src="js/app.js"></script>
	</body>
</html>
