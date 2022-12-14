<?php
    include('conexion_bd.php');

    $codigo = $_GET['id'];

    $sql="DELETE FROM trabajadores WHERE cargo = '$codigo'";
    $query=mysqli_query($conexion,$sql);

        if($query){
            Header("location: ../trabajadoresRegistrados.php");
        }
?>