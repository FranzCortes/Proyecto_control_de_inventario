<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "conexion_bd.php";
$sentencia = $base_de_datos->prepare("DELETE FROM ventas WHERE id = ?;");
$resultado = $sentencia->execute([$id]);
if($resultado === TRUE){
	header("Location: http://localhost/proyecto_control_de_inventario/ventas.php");
	exit;
}
else echo "Algo salió mal";
?>