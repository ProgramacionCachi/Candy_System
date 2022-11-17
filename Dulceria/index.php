<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Candy System - Inicio de Sesión</title>
	<link rel="icon" href="./Imagenes_Login/Caramelos_Header.png" type="image/png" /> <!-- ICONO DEL TITULO-->

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">

<body class="bg-gradient-success">
	<!--Color de Fondo de Pantalla-->

	<?php
	require_once 'DBconect.php';
	session_start();
	if (isset($_SESSION["admin_login"]))	//Condicion admin
	{
		header("location: admin/admin_portada.php");
	}
	if (isset($_SESSION["personal_login"]))	//Condicion personal
	{
		header("location: personal/personal_portada.php");
	}
	if (isset($_SESSION["usuarios_login"]))	//Condicion Usuarios
	{
		header("location: usuarios/usuarios_portada.php");
	}

	if (isset($_REQUEST['btn_login'])) {
		$email		= $_REQUEST["txt_email"];	//textbox nombre "txt_email"
		$password	= $_REQUEST["txt_password"];	//textbox nombre "txt_password"
		$role		= $_REQUEST["txt_role"];		//select opcion nombre "txt_role"

		if (empty($email)) {
			$errorMsg[] = "Por favor ingrese Email";	//Revisar email
		} else if (empty($password)) {
			$errorMsg[] = "Por favor ingrese Password";	//Revisar password vacio
		} else if (empty($role)) {
			$errorMsg[] = "Por favor seleccione rol ";	//Revisar rol vacio
		} else if ($email and $password and $role) {
			try {
				$select_stmt = $db->prepare("SELECT email,password,role FROM mainlogin
										WHERE
										email=:uemail AND password=:upassword AND role=:urole");
				$select_stmt->bindParam(":uemail", $email);
				$select_stmt->bindParam(":upassword", $password);
				$select_stmt->bindParam(":urole", $role);
				$select_stmt->execute();	//execute query

				while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
					$dbemail	= $row["email"];
					$dbpassword	= $row["password"];
					$dbrole		= $row["role"];
				}
				if ($email != null and $password != null and $role != null) {
					if ($select_stmt->rowCount() > 0) {
						if ($email == $dbemail and $password == $dbpassword and $role == $dbrole) {
							switch ($dbrole)		//inicio de sesión de usuario base de roles
							{
								case "admin":
									$_SESSION["admin_login"] = $email;
									$loginMsg = "Admin: Inicio sesión con éxito";
									header("refresh:3;admin/admin_portada.php");
									break;

								case "personal";
									$_SESSION["personal_login"] = $email;
									$loginMsg = "Personal: Inicio sesión con éxito";
									header("refresh:3;personal/personal_portada.php");
									break;

								case "usuarios":
									$_SESSION["usuarios_login"] = $email;
									$loginMsg = "Usuario: Inicio sesión con éxito";
									header("refresh:3;usuarios/usuarios_portada.php");
									break;

								default:
									$errorMsg[] = "correo electrónico o contraseña o rol incorrectos";
							}
						} else {
							$errorMsg[] = "correo electrónico o contraseña o rol incorrectos";
						}
					} else {
						$errorMsg[] = "correo electrónico o contraseña o rol incorrectos";
					}
				} else {
					$errorMsg[] = "correo electrónico o contraseña o rol incorrectos";
				}
			} catch (PDOException $e) {
				$e->getMessage();
			}
		} else {
			$errorMsg[] = "correo electrónico o contraseña o rol incorrectos";
		}
	}
	?>


	<div class="wrapper">

		<div class="container">

			<div class="col-lg-12">

				<?php
				if (isset($errorMsg)) {
					foreach ($errorMsg as $error) {
				?>
						<div class="alert alert-danger">
							<strong><?php echo $error; ?></strong>
						</div>
					<?php
					}
				}
				if (isset($loginMsg)) {
					?>
					<div class="alert alert-success">
						<strong>ÉXITO ! <?php echo $loginMsg; ?></strong>
					</div>
				<?php
				}
				?>
				<div class="container">
					<!-- Outer Row -->
					<div class="row justify-content-center">
						<div class="col-xl-10 col-lg-12 col-md-9">
							<div class="card o-hidden border-0 shadow-lg my-5">
								<div class="card-body p-0">
									<!-- Nested Row within Card Body -->
									<div class="row">
										<div class="col-lg-6 d-none d-lg-block imagen_login"></div>
										<div class="col-lg-6">
											<div class="p-5">
												<div class="text-center">
													<img src="./Imagenes_Login/Caramelos_Header.png" width="200" height="100" />
												</div>
												<br>
												<div class="text-center">
													<b>
														<h1 class="h4 text-gray-900 mb-4">Inicio de Sesión</h1>
													</b>
												</div>
												<form class="user">
													<div class="form-group">
														<input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Ingresar Correo Electrónico" name="txt_email" required>
													</div>
													<div class="form-group">
														<input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Ingresar Contraseña" name="txt_password" required>
													</div>
													<div class="form-group">
														<div class="col-sm-13">
															<select class="form-control" name="txt_role" required>
																<option value="" selected="selected"> - selecccionar rol - </option>
																<option value="admin">Admin</option>
																<option value="personal">Personal</option>
																<option value="usuarios">Usuarios</option>
															</select>
														</div>
													</div>


													<div class="form-group">
														<div class="col-sm-12">
															<center><input type="submit" name="btn_login" class="btn btn-success btn-block" value="Iniciar Sesion"></center>
														</div>
													</div>
													<hr>
												</form>
												<hr>
												<div class="text-center">
													<h6>¿No estas registrado?</h6>
													<a class="small" href="./registro.php">Resgistro</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>

					</div>
				</div>

				<style>
					.btn-flotante {
						font-size: 16px;
						/* Cambiar el tamaño de la tipografia */
						text-transform: uppercase;
						/* Texto en mayusculas */
						font-weight: bold;
						/* Fuente en negrita o bold */
						color: #ffffff;
						/* Color del texto */
						border-radius: 5px;
						/* Borde del boton */
						letter-spacing: 2px;
						/* Espacio entre letras */
						background-color: #E91E63;
						/* Color de fondo */
						padding: 18px 30px;
						/* Relleno del boton */
						position: fixed;
						bottom: 40px;
						right: 40px;
						transition: all 300ms ease 0ms;
						box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
						z-index: 99;
					}

					.btn-flotante:hover {
						background-color: #2c2fa5;
						/* Color de fondo al pasar el cursor */
						box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
						transform: translateY(-7px);
					}

					@media only screen and (max-width: 600px) {
						.btn-flotante {
							font-size: 14px;
							padding: 12px 20px;
							bottom: 20px;
							right: 20px;
						}
					}
				</style>

				<a href="./chatbot/bot.php" class="btn-flotante">Chatbot</a>

				<!-- Bootstrap core JavaScript-->
				<script src="vendor/jquery/jquery.min.js"></script>
				<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
				<!-- Core plugin JavaScript-->
				<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
				<!-- Custom scripts for all pages-->
				<script src="js/sb-admin-2.min.js"></script>
</body>

</html>