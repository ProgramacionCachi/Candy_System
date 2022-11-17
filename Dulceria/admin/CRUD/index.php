<?php include('BDconect.php');?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Administración de Usuarios</title>
<link rel="shortcut icon" href="./Caramelos_Header.png">


<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/sticky-footer-navbar.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $(".content").fadeOut(1500);
    },3000);

});
</script>
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
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
<nav class="navbar navbar-dark bg-dark">
<a class="navbar-brand" href="../admin_portada.php">
    <img src="./Caramelos_Header.png" width="50" height="30" class="d-inline-block align-top" alt="">
    Candy System
    <a href="../admin_portada.php"><button type="button" class="btn btn-danger">Página Principal</button></a>
  </a>
</nav>
</head>

<body>


<!-- Begin page content -->

<div class="container">
<?php
    
if(isset($_POST['eliminar'])){

////////////// Actualizar la tabla /////////
$consulta = "DELETE FROM `mainlogin` WHERE `id`=:id";
$sql = $connect-> prepare($consulta);
$sql -> bindParam(':id', $id, PDO::PARAM_INT);
$id=trim($_POST['id']);

$sql->execute();

if($sql->rowCount() > 0)
{
$count = $sql -> rowCount();
echo "<div class='content alert alert-primary' > 
Gracias: $count registro ha sido eliminado  </div>";
}
else{
    echo "<div class='content alert alert-danger'> No se pudo eliminar el registro  </div>";

print_r($sql->errorInfo()); 
}
}// Cierra envio de guardado
?>

<?php
    
if(isset($_POST['insertar'])){
///////////// Informacion enviada por el formulario /////////////
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$profesion=$_POST['profesion'];
$estado=$_POST['estado'];

///////// Fin informacion enviada por el formulario /// 

////////////// Insertar a la tabla la informacion generada /////////
$sql="insert into mainlogin(username,email,password,role) values(:nombres,:apellidos,:profesion,:estado)";
    
$sql = $connect->prepare($sql);
    
$sql->bindParam(':nombres',$nombres,PDO::PARAM_STR, 25);
$sql->bindParam(':apellidos',$apellidos,PDO::PARAM_STR, 25);
$sql->bindParam(':profesion',$profesion,PDO::PARAM_STR,25);
$sql->bindParam(':estado',$estado,PDO::PARAM_STR,25);

$sql->execute();

$lastInsertId = $connect->lastInsertId();
if($lastInsertId>0){

echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es : $nombres  </div>";
}
else{
    echo "<div class='content alert alert-danger'> No se pueden agregar datos, comuníquese con el administrador  </div>";

print_r($sql->errorInfo()); 
}
}// Cierra envio de guardado
?>

<?php
    
if(isset($_POST['actualizar'])){
///////////// Informacion enviada por el formulario /////////////
$id=trim($_POST['id']);
$nombres=trim($_POST['nombres']);
$apellidos=trim($_POST['apellidos']);
$profesion=trim($_POST['profesion']);
$estado=trim($_POST['estado']);

///////// Fin informacion enviada por el formulario /// 

////////////// Actualizar la tabla /////////
$consulta = "UPDATE mainlogin
SET `username`= :nombres, `email` = :apellidos, `password` = :profesion, `role` = :estado
WHERE `id` = :id";
$sql = $connect->prepare($consulta);
$sql->bindParam(':nombres',$nombres,PDO::PARAM_STR, 25);
$sql->bindParam(':apellidos',$apellidos,PDO::PARAM_STR, 25);
$sql->bindParam(':profesion',$profesion,PDO::PARAM_STR,25);
$sql->bindParam(':estado',$estado,PDO::PARAM_STR,25);

$sql->bindParam(':id',$id,PDO::PARAM_INT);

$sql->execute();

if($sql->rowCount() > 0)
{
$count = $sql -> rowCount();
echo "<div class='content alert alert-primary' > 

  
Gracias: $count registro ha sido actualizado  </div>";
}
else{
    echo "<div class='content alert alert-danger'> No se pudo actulizar el registro  </div>";

print_r($sql->errorInfo()); 
}
}// Cierra envio de guardado
?>
  <h1 class="mt-5">Administración de Usuarios Registrados</h1>
  <hr>
  <div class="row">
  
  <!-- Insertar Registros-->
  <?php 
if (isset($_POST['formInsertar'])){?>
    <div class="col-12 col-md-12"> 
<form action="" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombres">Nombre</label>
      <input name="nombres" type="text" class="form-control" placeholder="Nombres" required>
    </div>
    <div class="form-group col-md-6">
      <label for="edad">Correo Electrónico</label> 
      <input name="apellidos" type="text" class="form-control" id="edad" placeholder="Apellidos" required>
    </div>
  </div>
<div class="form-row">  
    <div class="form-group col-md-6">
      <label for="profesion">Contraseña</label>
      <input name="profesion" type="text" class="form-control" id="profesion" placeholder="Contraseña" required>
    </div>

  <div class="form-group col-md-6">
    <label for="Estado">Rol</label>
    <select required name="estado" class="form-control" id="Estado" required>
    <option value="">- Seleccionar Rol -</option>
    <option value="admin">Administrador</option>
          <option value="personal">Personal</option>
          <!--<option value="usuarios">Usuarios</option>-->
    </select>
  </div>

</div>
<div class="form-group">
  <button name="insertar" type="submit" class="btn btn-primary  btn-block">Guardar</button>
</div>
</form>
    </div> 
<?php }  ?>
<!-- Fin Insertar Registros-->


<?php 
if (isset($_POST['editar'])){
$id = $_POST['id'];
$sql= "SELECT * FROM mainlogin WHERE id = :id"; 
$stmt = $connect->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT); 
$stmt->execute();
$obj = $stmt->fetchObject();
 
?>

    <div class="col-12 col-md-12"> 

<form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <input value="<?php echo $obj->id;?>" name="id" type="hidden">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombres">Nombre</label>
      <input value="<?php echo $obj->username;?>" name="nombres" type="text" class="form-control" placeholder="Nombres">
    </div>
    <div class="form-group col-md-6">
      <label for="edad">Correo Electrónico</label>
      <input value="<?php echo $obj->email;?>" name="apellidos" type="email" class="form-control" id="edad" placeholder="Apellidos">
    </div>
  </div>
<div class="form-row">  
    <div class="form-group col-md-6">
      <label for="profesion">Contraseña</label>
      <input value="<?php echo $obj->password;?>" name="profesion" type="password" class="form-control" id="profesion" placeholder="Profesion">
    </div>

  <div class="form-group col-md-6">
    <label for="Estado">Rol</label>
    <select required name="estado" class="form-control" id="Estado" required>      
    <option value="">- Seleccionar Rol -</option>
    <option value="admin">Administrador</option>
          <option value="personal">Personal</option>
          <!--<option value="usuarios">Usuarios</option>-->
    </select>
  </div>

</div>
<div class="form-group">
  <button name="actualizar" type="submit" class="btn btn-primary  btn-block">Actualizar Registro</button>
</div>
</form>
    </div>  
<?php }?>
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->


<div style="float:right; margin-bottom:5px;">

<form action="" method="post"><button class="btn btn-success" name="formInsertar">Nuevo registro</button>  <a href="index.php"><button type="button" class="btn btn-info">Cancelar</button></a></form></div>
<div class="table-responsive">
<table class="table ">
<thead class="">
    <th width="18%">ID</th>
    <th width="22%">Nombre</th>
    <th width="22%">Correo Electrónico</th>
    <!--<th width="14%">Contraseña</th>-->
    <th width="13%">Rol</th>
    <th width="13%" colspan="2"></th>
</thead>
<tbody>
<?php
$sql = "SELECT * FROM mainlogin"; 
$query = $connect -> prepare($sql); 
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ); 

if($query -> rowCount() > 0)   { 
foreach($results as $result) { 
echo "<tr>
<td>".$result -> id."</td>
<td>".$result -> username."</td>
<td>".$result -> email."</td>
<!--<td>".$result -> password."</td>-->
<td>".$result -> role."</td>
<td>
<form method='POST' action='".$_SERVER['PHP_SELF']."'>
<input type='hidden' name='id' value='".$result -> id."'>
<button name='editar'>Editar</button>
</form>
</td>

<td>
<form  onsubmit=\"return confirm('Realmente desea eliminar el registro?');\" method='POST' action='".$_SERVER['PHP_SELF']."'>
<input type='hidden' name='id' value='".$result -> id."'>
<button name='eliminar'>Eliminar</button>
</form>
</td>
</tr>";

   }
 }
?>
</tbody>
</table>
</div>
   </div>  
  </div>
 

      <!-- Fin Contenido --> 
    </div>
  </div>
  <!-- Fin row --> 
  
</div>
<!-- Bootstrap core JavaScript
    ================================================== --> 
<script src="dist/js/bootstrap.min.js"></script> 
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>