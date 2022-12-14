<?php
if (!isset($_POST["cantidad"])) {
	exit("No hay cantidad");
}
if (!isset($_POST["indice"])) {
	exit("No hay índice");
}
$cantidad = floatval($_POST["cantidad"]);
$indice = intval($_POST["indice"]);
session_start();
if ($cantidad > $_SESSION["compras"][$indice]->stock) {
	header("Location: http://localhost/proyecto_control_de_inventario/vender.php?status=5");
	exit;
}
$_SESSION["compras"][$indice]->cantidad = $cantidad;
$_SESSION["compras"][$indice]->total = $_SESSION["compras"][$indice]->cantidad * $_SESSION["compras"][$indice]->venta;
header("Location: http://localhost/proyecto_control_de_inventario/vender.php");
