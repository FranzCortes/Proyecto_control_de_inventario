<?php
    include('conexion_bd.php');

    $codigo = $_GET['id'];

    $sql="DELETE FROM productos WHERE codigo = '$codigo'";
    $query=mysqli_query($conexion,$sql);

        if($query){
            Header("location: ../inventario.php");
        }

?>