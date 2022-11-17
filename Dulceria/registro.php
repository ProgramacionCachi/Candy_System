<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Candy System - Registro</title>
	<link rel="icon" href="./Imagenes_Login/Caramelos_Header.png" type="image/png" /> <!-- ICONO DEL TITULO-->	

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">

<body class="bg-gradient-success">

	</head>

	<body>
		<?php

		require_once "DBconect.php";

		if (isset($_REQUEST['btn_register'])) //compruebe el nombre del botón "btn_register" y configúrelo
		{
			$username	= $_REQUEST['txt_username'];	//input nombre "txt_username"
			$email		= $_REQUEST['txt_email'];	//input nombre "txt_email"
			$password	= $_REQUEST['txt_password'];	//input nombre "txt_password"
			$role		= $_REQUEST['txt_role'];	//seleccion nombre "txt_role"

			if (empty($username)) {
				$errorMsg[] = "Ingrese nombre de usuario";	//Compruebe input nombre de usuario no vacío
			} else if (empty($email)) {
				$errorMsg[] = "Ingrese email";	//Revisar email input no vacio
			} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$errorMsg[] = "Ingrese email valido";	//Verificar formato de email
			} else if (empty($password)) {
				$errorMsg[] = "Ingrese password";	//Revisar password vacio o nulo
			} else if (strlen($password) < 6) {
				$errorMsg[] = "Password minimo 6 caracteres";	//Revisar password 6 caracteres
			} else if (empty($role)) {
				$errorMsg[] = "Seleccione rol";	//Revisar etiqueta select vacio
			} else {
				try {
					$select_stmt = $db->prepare("SELECT username, email FROM mainlogin 
										WHERE username=:uname OR email=:uemail"); // consulta sql
					$select_stmt->bindParam(":uname", $username);
					$select_stmt->bindParam(":uemail", $email);      //parámetros de enlace
					$select_stmt->execute();
					$row = $select_stmt->fetch(PDO::FETCH_ASSOC);
					if ($row["username"] == $username) {
						$errorMsg[] = "Usuario ya existe";	//Verificar usuario existente
					} else if ($row["email"] == $email) {
						$errorMsg[] = "Email ya existe";	//Verificar email existente
					} else if (!isset($errorMsg)) {
						$insert_stmt = $db->prepare("INSERT INTO mainlogin(username,email,password,role) VALUES(:uname,:uemail,:upassword,:urole)"); //Consulta sql de insertar			
						$insert_stmt->bindParam(":uname", $username);
						$insert_stmt->bindParam(":uemail", $email);	  		//parámetros de enlace 
						$insert_stmt->bindParam(":upassword", $password);
						$insert_stmt->bindParam(":urole", $role);

						if ($insert_stmt->execute()) {
							$registerMsg = "Registro exitoso: Esperar página de inicio de sesión"; //Ejecuta consultas 
							header("refresh:2;index.php"); //Actualizar despues de 2 segundo a la portada
						}
					}
				} catch (PDOException $e) {
					echo $e->getMessage();
				}
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
								<strong>INCORRECTO ! <?php echo $error; ?></strong>
							</div>
						<?php
						}
					}
					if (isset($registerMsg)) {
						?>
						<div class="alert alert-success">
							<strong>EXITO ! <?php echo $registerMsg; ?></strong>
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
											<div class="col-lg-6 d-none d-lg-block imagen_registro"></div>
											<div class="col-lg-6">
												<div class="p-5">
													<div class="text-center">
														<img src="./Imagenes_Login/Caramelos_Header.png" width="200" height="100" />
													</div>
													<br>
													<div class="text-center">
														<b>
															<h1 class="h4 text-gray-900 mb-4">Registro</h1>
														</b>
													</div>
													<form class="user">
														<div class="form-group">
															<input type="text" class="form-control form-control-user" id="exampleInputUser" aria-describedby="UserHelp" placeholder="Ingresar Nombre del Usuario" name="txt_username" required>
														</div>
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
																	<!--<option value="admin">Admin</option>-->
																	<option value="personal">Personal</option>
																	<option value="usuarios">Usuarios</option>
																</select>
															</div>
														</div>


														<center>
															<div class="form-group">
																<div class="col-sm-12">
																	<input type="submit" name="btn_register" class="btn btn-primary btn-block" value="Registrar">
																	<!--<a href="index.php" class="btn btn-danger">Cancel</a>-->
																</div>
															</div>

															<div class="form-group">
																<div class="col-sm-12">
																	¿Tienes una cuenta? <a href="index.php">
																		<p class="text-info">Inicio de sesión</p>
																	</a>
																</div>
															</div>
														</center>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>

						</div>
					</div>
					<!-- Bootstrap core JavaScript-->
					<script src="vendor/jquery/jquery.min.js"></script>
					<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
					<!-- Core plugin JavaScript-->
					<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
					<!-- Custom scripts for all pages-->
					<script src="js/sb-admin-2.min.js"></script>
	</body>

</html>