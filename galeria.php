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
		<title>Galería - <?php echo __DISPLAY_NAME__; ?></title>

		<meta name="title" content="Galería - <?php echo __DISPLAY_NAME__; ?>" />
		<meta name="description" content="Recursos multimedia relacionados a nuestro servicio." />
		<meta name="keywords" content="recargas, saldo, galeria, imagenes" />
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
		<h1 hidden>Galería - <?php echo __DISPLAY_NAME__; ?></h1>

		<!-- NAVBAR -->
		<?php include 'includes/navbar.php'; ?>

		<!-- HEADER -->
		<header id="header" class="header">
			<div class="header__banner header__banner--galeria"></div>

			<!-- FORMUALRIO RECARGAR -->
            <?php include 'includes/formulario-recargar.php'; ?>
		</header>

		<!-- MAIN -->
		<main>
			<!-- GALERIA -->
			<section id="galeria">
				<h2>Galeria</h2>
				<div class="grid-galeria container">
					<picture>
						<source media="(min-width:480px)" srcset="assets/img/galeria1.jpg" />
						<img src="assets/img/galeria1-sm.jpg" alt="Mujer joven sonriendo y escribiendo un mensaje en su telefono" />
					</picture>
					<picture>
						<source media="(min-width:480px)" srcset="assets/img/galeria2.jpg" />
						<img src="assets/img/galeria2-sm.jpg" alt="Pareja sentada en sillón viendo un teléfono" />
					</picture>
					<picture>
						<source media="(min-width:480px)" srcset="assets/img/galeria3.jpg" />
						<img src="assets/img/galeria3-sm.jpg" alt="Hombre en la calle sonriendo mientras sostiene un café y su teléfono en la otra mano" />
					</picture>
					<picture>
						<source media="(min-width:480px)" srcset="assets/img/galeria4.jpg" />
						<img src="assets/img/galeria4-sm.jpg" alt="Pareja sonriendo mientras ven un telefono" />
					</picture>
				</div>
			</section>
		</main>

		<!-- FOOTER -->
		<?php include 'includes/footer.php'; ?>

		<script src="librerias/bootstrap/js/bootstrap.min.js"></script>
		<script src="js/config.js"></script>
		<script src="js/app.js"></script>
	</body>
</html>
