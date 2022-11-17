<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>Ventas Realizadas</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<script src="../js/jquery-1.12.4-jquery.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

	<style type="text/css">
		.login-form {
			width: 340px;
			margin: 20px auto;
		}

		.login-form form {
			margin-bottom: 15px;
			background: #f7f7f7;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			padding: 30px;
		}

		.login-form h2 {
			margin: 0 0 15px;
		}

		.form-control,
		.btn {
			min-height: 38px;
			border-radius: 2px;
		}

		.btn {
			font-size: 15px;
			font-weight: bold;

		}

		.fill:hover,
		.fill:focus {
			box-shadow: inset 0 0 0 2em var(--hover);
		}

		.pulse:hover,
		.pulse:focus {
			-webkit-animation: pulse 1s;
			animation: pulse 1s;
			box-shadow: 0 0 0 2em rgba(255, 255, 255, 0);
		}

		@-webkit-keyframes pulse {
			0% {
				box-shadow: 0 0 0 0 var(--hover);
			}
		}

		@keyframes pulse {
			0% {
				box-shadow: 0 0 0 0 var(--hover);
			}
		}

		.close:hover,
		.close:focus {
			box-shadow: inset -3.5em 0 0 0 var(--hover), inset 3.5em 0 0 0 var(--hover);
		}

		.raise:hover,
		.raise:focus {
			box-shadow: 0 0.5em 0.5em -0.4em var(--hover);
			-webkit-transform: translateY(-0.25em);
			transform: translateY(-0.25em);
		}

		.up:hover,
		.up:focus {
			box-shadow: inset 0 -3.25em 0 0 var(--hover);
		}

		.slide:hover,
		.slide:focus {
			box-shadow: inset 6.5em 0 0 0 var(--hover);
		}

		.offset {
			box-shadow: 0.3em 0.3em 0 0 var(--color), inset 0.3em 0.3em 0 0 var(--color);
		}

		.offset:hover,
		.offset:focus {
			box-shadow: 0 0 0 0 var(--hover), inset 6em 3.5em 0 0 var(--hover);
		}

		.fill {
			--color: #1973bc;
			--hover: #82E0AA;

		}

		button {
			color: var(--color);
			-webkit-transition: 0.25s;
			transition: 0.25s;
		}

		button:hover,
		button:focus {
			border-color: var(--hover);
			color: #fff;
		}

		button {
			background: none;
			border: 2px solid;
			font: inherit;
			line-height: 1;
			margin: 0.5em;
			padding: 1em 2em;
		}

		h1 {
			font-weight: 400;
		}

		code {
			color: #e4cb58;
			font: inherit;
		}

		.logo_izquierda {
			float: left;
		}

		.logo_derecha {
			float: right;
		}

		.letra_caramelo {

			font: oblique bold 250% cursive;

		}
	</style>
</head>

<body>
	<?php include("./header_personal.php"); ?>

	<div class="wrapper">

		<div class="container">

			<div class="col-lg-12">

				<center>
					<div class="logo_izquierda">
						<img src="../Imagenes_Login/Logo_Sin_Fondo.png" style="width : 200px; heigth : 200px" />
					</div>
					<div class="logo_derecha">
						<img src="../Imagenes_Login/Dulce_Dia.png" style="width : 200px; heigth : 200px" />
					</div>
					<br><br>
					<h1>Pagina personal</h1>

					<h3>
						<?php

						session_start();

						if (!isset($_SESSION['personal_login'])) {
							header("location: ../index.php");
						}

						if (isset($_SESSION['admin_login'])) {
							header("location: ../admin/admin_portada.php");
						}

						if (isset($_SESSION['usuarios_login'])) {
							header("location: ../usuarios/usuarios_portada.php");
						}

						if (isset($_SESSION['personal_login'])) {
						?>
							Bienvenido,
						<?php
							echo $_SESSION['personal_login'];
						}
						?>
					</h3>
					<br>
					<a href="../cerrar_sesion.php"><button class="fill">Cerrar Ssión</button></button></a>
					<a href="./Ventas/index.php"><button class="fill">Realizar Ventas</button></button></a><br>
					<hr>
					<!--<img src="../Imagenes_Login/Bienvenido_Candy_System.png" style="width : 500px; heigth : 200px"/>-->
					<?php include("./carrusel_personal.php"); ?>
				</center>

			</div>
		</div>

	</div>

</body>

</html>