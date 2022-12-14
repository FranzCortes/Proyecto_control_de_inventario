<?php
    session_start();

    if(!isset($_SESSION['usuario'])){
        echo '
            <script>
                alert("Por favor debes iniciar sesion primero");
                window.location = "http://localhost/proyecto_control_de_inventario/login.php";
            </script>
        ';
        session_destroy();
        die();
    }
	include_once "php/ventas/conexion_bd.php";
	$sentencia = $base_de_datos->query("SELECT ventas.total, ventas.fecha, ventas.id, GROUP_CONCAT(	productos.codigo, '..', productos.producto, '..', productos_vendidos.cantidad SEPARATOR '__') AS productos FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id INNER JOIN productos ON productos.id = productos_vendidos.id_producto GROUP BY ventas.id ORDER BY ventas.id;");
	$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <link rel="icon" type="imagen/x-icon" href="http://localhost/proyecto_control_de_inventario/assets/images/icono.png">
    <link rel="stylesheet" href="assets/css/panel.css"/>
	<link rel="stylesheet" href="assets/css/ventas.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body id="body">
<header>
    <div class="icono_menu">
        <i class="bi bi-list" id="btn_open"></i>
    </div>
    <div class="logo_app">
        <img src="assets/images/logo_app_sin_fondo.png" alt="logo app"  />
    </div>
</header>
    <?php require ("layout/nav.php")  ?>
<main>
	<div class="col-xs-12">
		<h1>Ventas</h1>
		<div>
			<a class="btn btn-success" href="vender.php">Nueva <i class="bi bi-plus-circle"></i></a>
		</div>
		<br>
		<div class="container-fluid">
    <div class="buscador">
        <form class="d-flex">
            <label for="buscador">Buscar producto: </label>
            <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" name="buscador" id="buscador" placeholder="Buscardor">
            <hr>
        </form>
    </div>
</div>
<br>
		<table class="table table-bordered">
			<thead class="head_table">
				<tr>
					<th>Número</th>
					<th>Fecha</th>
					<th>Productos vendidos</th>
					<th>Total</th>
					<th>Ticket</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ventas as $venta){ ?>
				<tr>
					<td><?php echo $venta->id ?></td>
					<td><?php echo $venta->fecha ?></td>
					<td>
						<table class="table table-bordered">
							<thead class="subhead_table">
								<tr>
									<th>Código</th>
									<th>Descripción</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $venta->productos) as $productosConcatenados){ 
								$producto = explode("..", $productosConcatenados)
								?>
								<tr>
									<td><?php echo $producto[0] ?></td>
									<td><?php echo $producto[1] ?></td>
									<td><?php echo $producto[2] ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
					<td>$ <?php echo $venta->total ?></td>
					<td><a class="btn btn-info" href="<?php echo "php/ventas/imprimirTicket.php?id=" . $venta->id?>"><i class="bi bi-filetype-pdf"></i></td>
					<td><a class="btn btn-danger" href="<?php echo "php/ventas/eliminarVenta.php?id=" . $venta->id?>"><i class="bi bi-trash3-fill"></i></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	</div>
	</div>
</main>
    <script src="assets/js/panel.js"></script>
	<script src="http://localhost/proyecto_control_de_inventario/assets/js/buscador.js"></script>
</body>
</html>