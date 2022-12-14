<?php

    include('conexion_bd.php');

    $id = $_POST['id'];
    $codigo = $_POST['codigo'];
    $producto = $_POST['producto'];
    $categoria = $_POST['categoria'];
    $precio= $_POST ['precio'];
    $venta = $_POST ['venta'];
    $stock = $_POST ['stock'];


    $sql="UPDATE productos SET codigo = '$codigo', producto='$producto', 
    categoria ='$categoria', precio = '$precio', 
    venta = '$venta', stock = '$stock' WHERE id = '$id'";
    $query=mysqli_query($conexion,$sql);

        if($query){
            Header("location: ../inventario.php");
        }
?>