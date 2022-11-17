<title>Factura</title>
<link rel="shortcut icon" href="./Imagenes_Login/Caramelos_Header.png">


<?php
if (!isset($_GET["id_facturar"])) exit();
$id = $_GET["id_facturar"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM ventas WHERE id = ?;");
/*$sentencia = $base_de_datos->prepare("SELECT * FROM ventas WHERE id = ?;");*/
/*SELECT * FROM productos_vendidos JOIN productos ON productos_vendidos.id_producto = productos.id WHERE id_venta = '3';*/
$sentencia->execute([$id]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if ($producto === FALSE) {

    echo "¡No existe algún producto con ese ID!";
    //exit();
}

?>


<style type="text/css">

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

<?php include_once "./header_factura.php" ?>
<?php
include_once "base_de_datos.php";
?>

<div class="logo_izquierda">
    <img src="./Imagenes_Login/Logo_Sin_Fondo.png" style="width : 150px; heigth : 200px" />
</div>
<div class="logo_derecha">
    <img src="./Imagenes_Login/Dulce_Dia.png" style="width : 150px; heigth : 200px" />
</div>

<div class="wrapper">

    <div class="container">

        <div class="col-lg-12"><br>
            <center><h2>FACTURA DE VENTA <?php echo $producto->id; ?></h2>
        <h2>CANDY SYSTEM</h2></center>


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID VENTA</th>
                        <th>FECHA Y HORA DE LA COMPRA</th>
                        <th>TOTAL PAGADO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php $ID_FACTURA = $producto->id ?>
                        <td><?php echo $producto->id ?></td>
                        <td><?php echo $producto->fecha ?></td>
                        <td> $<?php echo $producto->total ?></td>

                    </tr>
                </tbody>
            </table>


        </div>

        <?php
        include_once "base_de_datos.php";

        $sentencia = $base_de_datos->query("SELECT * FROM productos_vendidos JOIN productos ON productos_vendidos.id_producto = productos.id WHERE id_venta = '$ID_FACTURA';");
        $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        ?>

        <div class="col-lg-12">
            <h4>PRODUCTOS VENDIDOS: </h4>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>CÓDIGO</th>
                        <th>DESCRIPCIÓN</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO VENTA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto) { ?>
                        <tr>
                            <td><?php echo $producto->codigo ?></td>
                            <td><?php echo $producto->descripcion ?></td>
                            <td><?php echo $producto->cantidad ?></td>
                            <td> $<?php echo $producto->precioVenta ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php include_once "pie.php" ?>