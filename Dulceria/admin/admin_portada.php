<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Candy System - Página Prinicipal</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../img" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

<body>
    <?php
    session_start();

    if (!isset($_SESSION['admin_login'])) {
        header("location: ../index.php");
    }

    if (isset($_SESSION['personal_login'])) {
        header("location: ../personal/personal_portada.php");
    }

    if (isset($_SESSION['usuarios_login'])) {
        header("location: ../usuarios/usuarios_portada.php");
    }

    if (isset($_SESSION['admin_login'])) {
    ?>
        <!--Bienvenido,-->
    <?php
        //echo $_SESSION['admin_login'];
    }
    ?>




    <!------------------------------------------------------------------->


    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
                <!--Cambia color de barra laterial---------->

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                    <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa-thin fa-candy"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Candy System</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="./admin_portada.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Página Principal</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <!--<i class="fas fa-fw fa-cog"></i>-->
                        <span>Personal</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Edición y Bajas:</h6>
                            <a class="collapse-item" href="./index.php">Administración de Usuarios<br>Registrados</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <!--<i class="fas fa-fw fa-wrench"></i>--->
                        <span>Ventas</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Administración:</h6>
                            <a class="collapse-item" href="./Ventas/ventas.php">Ventas</a>
                            <a class="collapse-item" href="./Ventas/listar.php">Edición y Baja de <br>Productos</a>
                            <a class="collapse-item" href="./Ventas/formulario.php">Alta de Productos</a>
                            <a class="collapse-item" href="./Ventas/vender.php">Realizar Venta</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Asistete Virtual
                </div>

               <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="./CRUD _CHATBOOT/index.php">
                        <!--<i class="fas fa-fw fa-chart-area"></i>-->
                        <span> ChatBot</span></a>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="../cerrar_sesion.php">
                        <!--<i class="fas fa-fw fa-table"></i>-->
                        <span>Cerrar Sesión</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

			

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Navbar -->
                        <h3>Tecnológico de Estudios Superiores de Huixquilucan</h3>
                        <!-- Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>
                            <?php
                            require_once '../DBconect.php';
                            $select_stmt = $db->prepare("SELECT id, username,email, role  FROM mainlogin WHERE email = '$_SESSION[admin_login]'");
                            $select_stmt->execute();

                            while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                <!-- Nav Item - User Information -->
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo "Bienvenid@ <br>" . $row["username"];
                                                                                                } ?></span>
                                        <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                                    </a>
                                    <!-- Dropdown - User Information -->
                                </li>


                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!--- PARTE CENTRAL DE LA INTERFAZ----------------------------------------------------------------------------------------------------------->
                        <h1 class="h3 mb-4 text-gray-800">Página Principal</h1>
                        <div class="container">
                            <div>
                                </center>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <!--<th width="4%">ID</th>-->
                                                            <th width="18%">Usuario</th>
                                                            <th width="24%">Correo Electrónico</th>
                                                            <th width="19%">Rol</th>
                                                            <!--<th width="24%">Password</th>-->
                                                            <th colspan="2">Opciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        require_once '../DBconect.php';
                                                        $select_stmt = $db->prepare("SELECT id, username,email, role  FROM mainlogin WHERE email = '$_SESSION[admin_login]'");
                                                        $select_stmt->execute();

                                                        while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                            <tr>
                                                                <!--<td><?php echo $row["id"]; ?></td>-->
                                                                <td><?php echo $row["username"]; ?></td>
                                                                <td><?php echo $row["email"]; ?></td>
                                                                <td><?php echo $row["role"]; ?></td>
                                                                <!--<td>*******</td>-->
                                                                <td width="4%"><button class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button></td>
                                                                <td width="7%"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <center><img src="../Imagenes_Login/Logo_Sin_Fondo.png" width="350" height="350"/></center>
                                            <!-- /.table-responsive -->
                                        </div>
                                        <!-- /.panel-body -->
                                    </div>
                                    <!-- /.panel -->
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>





            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->



        </div>
        <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../js/sb-admin-2.min.js"></script>

    </body>

</html>
<!--<a href="../cerrar_sesion.php"><button class="btn btn-danger text-left"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cerrar Sesion</button></a>-->