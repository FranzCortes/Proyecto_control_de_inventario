<?php
if (!isset($_POST["codigo"])) {
    return;
}

$codigo = $_POST["codigo"];
include_once "conexion_bd.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM productos WHERE codigo = ?  LIMIT 1;");
$sentencia->execute([$codigo]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
# Si no existe, salimos y lo indicamos
if (!$producto) {
    header("Location: http://localhost/proyecto_control_de_inventario/vender.php?status=4");
    exit;
}
# Si no hay stock...
if ($producto->stock < 1) {
    header("Location: http://localhost/proyecto_control_de_inventario/vender.php?status=5");
    exit;
}
session_start();
# Buscar producto dentro del carrito
$indice = false;
for ($i = 0; $i < count($_SESSION["compras"]); $i++) {
    if ($_SESSION["compras"][$i]->codigo === $codigo) {
        $indice = $i;
        break;
    }
}
# Si no existe, lo agregamos como nuevo
if ($indice === false) {
    $producto->cantidad = 1;
    $producto->total = $producto->venta;
    array_push($_SESSION["compras"], $producto);
} else {
    # Si ya existe, se agrega la cantidad
    # Pero espera, tal vez ya no haya
    $cantidadExistente = $_SESSION["compras"][$indice]->cantidad;
    # si al sumarle uno supera lo que existe, no se agrega
    if ($cantidadExistente + 1 > $producto->stock) {
        header("Location: http://localhost/proyecto_control_de_inventario/vender.php?status=5");
        exit;
    }
    $_SESSION["compras"][$indice]->cantidad++;
    $_SESSION["compras"][$indice]->total = $_SESSION["compras"][$indice]->cantidad * $_SESSION["compras"][$indice]->venta;
}
header("Location: http://localhost/proyecto_control_de_inventario/vender.php");
