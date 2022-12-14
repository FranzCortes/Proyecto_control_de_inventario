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

    include('php/conexion_bd.php');
	if (!isset($_SESSION["compras"])) $_SESSION["compras"] = [];
    $granTotal = 0;

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
	<link rel="stylesheet" href="assets/css/vender.css"/>
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
	<h1 class="titulo">Vender</h1>
	<?php
	if (isset($_GET["status"])) {
		if ($_GET["status"] === "1") {
	?>
			<div class="alert alert-success">
				<strong>¡Correcto!</strong> Venta realizada correctamente
			</div>
		<?php
		} else if ($_GET["status"] === "2") {
		?>
			<div class="alert alert-info">
				<strong>Venta cancelada</strong>
			</div>
		<?php
		} else if ($_GET["status"] === "3") {
		?>
			<div class="alert alert-info">
				<strong>Ok</strong> Producto quitado de la lista
			</div>
		<?php
		} else if ($_GET["status"] === "4") {
		?>
			<div class="alert alert-warning">
				<strong>Error:</strong> El producto que buscas no existe
			</div>
		<?php
		} else if ($_GET["status"] === "5") {
		?>
			<div class="alert alert-danger">
				<strong>Error: </strong>El producto está agotado
			</div>
		<?php
		} else {
		?>
			<div class="alert alert-danger">
				<strong>Error:</strong> Algo salió mal mientras se realizaba la venta
			</div>
	<?php
		}
	}
	?>
	<br>
	<form method="post" action="php/ventas/agregarAlCarrito.php">
		<div class="buscador">
			<label for="codigo">Código de barras:</label></br>
			<input  autocomplete="off" autofocus class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">
			<button class="agregar_codigo">Agregar</button>
		</div>
	</form>
	<br><br>
	<table class="table table-bordered">
		<thead class="head_table">
			<tr>
				<th>Código</th>
				<th>Producto</th>
				<th>Categoria</th>
				<th>Precio de venta</th>
				<th>Cantidad</th>
				<th>Total</th>
				<th>Quitar</th>
			</tr>
		</thead>
		<tbody class="body_table">
			<?php foreach ($_SESSION["compras"] as $indice => $producto) {
				$granTotal += $producto->total;
			?>
				<tr>
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->producto ?></td>
					<td><?php echo $producto->categoria ?></td>
					<td> $ <?php echo $producto->venta ?></td>
					<td>
						<form action="php/ventas/cambiar_cantidad.php" method="post">
							<input name="indice" type="hidden" value="<?php echo $indice; ?>">
							
							<input min="1" name="cantidad" id="codigo" class="form-control" required type="number" step="0.1" value="<?php echo $producto->cantidad; ?>">
							<button class="boton_suma">Agregar</button>
						</form>
					</td>
					<td>$ <?php echo $producto->total ?></td>
					<td><a class="btn btn-danger" href="<?php echo "php/ventas/quitarDelCarrito.php?indice=" . $indice ?>"><i class="bi bi-trash3-fill"></i></a></td>
				</tr>
			<?php 
			} 
			?>
		</tbody>
	</table>

	<h3 class="total">Total: $ <?php echo $granTotal; ?></h3>
	<form action="./php/ventas/terminarVenta.php" method="POST">
		<div class="terminar_cancelar_venta">
			<input name="total" type="hidden" value="<?php echo $granTotal; ?>">
			<button type="submit" class="btn btn-success">Terminar venta</button>
			<button><a href="./php/ventas/cancelarVenta.php" class="btn btn-danger">Cancelar venta</a></button>
		</div>
	</form>
</div>

    </main>
    <script src="assets/js/panel.js"></script>
</body>
</html>
