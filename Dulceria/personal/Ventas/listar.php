<title>Lista de Productos</title>
<link rel="shortcut icon" href="./Imagenes_Login/Caramelos_Header.png">
<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM productos;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<div class="wrapper">

	<div class="container">

		<div class="col-lg-12">
			<h1>Productos</h1>
			<br>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>Código</th>
						<th>Descripción</th>
						<th>Precio de compra</th>
						<th>Precio de venta</th>
						<th>Existencia</th>

					</tr>
				</thead>
				<tbody>
					<?php foreach ($productos as $producto) { ?>
						<tr>
							<td><?php echo $producto->id ?></td>
							<td><?php echo $producto->codigo ?></td>
							<td><?php echo $producto->descripcion ?></td>
							<td><?php echo $producto->precioCompra ?></td>
							<td><?php echo $producto->precioVenta ?></td>
							<td><?php echo $producto->existencia ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<?php include_once "pie.php" ?>