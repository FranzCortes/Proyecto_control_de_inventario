<?php

session_start();

unset($_SESSION["compraso"]);
$_SESSION["compras"] = [];

header("Location: http://localhost/proyecto_control_de_inventario/vender.php?status=2");
?>