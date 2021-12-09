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
		<title>Nuestros números - <?php echo __DISPLAY_NAME__; ?></title>

		<meta name="title" content="Nuestros números - <?php echo __DISPLAY_NAME__; ?>" />
		<meta name="description" content="Te mostramos algunas de nuestras estadísticas." />
		<meta name="keywords" content="recargas, saldo, estadísticas, usuarios, miembros equipo, recargas procesadas, recargas pendientes" />
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
		<h1 hidden>Nuestros números - <?php echo __DISPLAY_NAME__; ?></h1>

		<!-- NAVBAR -->
		<?php include 'includes/navbar.php'; ?>

		<!-- HEADER -->
		<header id="header" class="header">
			<div class="header__banner header__banner--nuestros-numeros"></div>

			<!-- FORMUALRIO RECARGAR -->
            <?php include 'includes/formulario-recargar.php'; ?>
		</header>

		<!-- MAIN -->
		<main>
			<!-- NUESTROS NUMEROS -->
			<section id="nuestros_numeros">
				<h2>Nuestros números</h2>

				<div class="alert alert-info mb-5 rounded-0" role="alert">Los datos son reales y corresponden a la plataforma mediante la cuál serán procesadas todas las recargas solicitadas desde este sitio.</div>

				<div class="row g-4 py-0 row-cols-1 row-cols-lg-3">
					<div class="feature col">
						<h3><img class="icons" src="assets/img/user.svg" alt="Icono de usuario" /> Usuarios</h3>
						<p>La plataforma cuenta con más de <strong>3.000 usuarios</strong> registrados.</p>
					</div>

					<div class="feature col">
						<h3><img class="icons" src="assets/img/chart.svg" alt="Icono de grafico subiendo" /> Recargas</h3>
						<p>Se procesaron más de <strong>325.000 recargas</strong> desde Junio de 2019.</p>
					</div>

					<div class="feature col">
						<h3><img class="icons" src="assets/img/users-team.svg" alt="Icono miembros de equipo" /> Equipo</h3>
						<p>El equipo está conformado por <strong>5 personas</strong>.</p>
					</div>
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
