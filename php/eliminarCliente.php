<?php
    include('conexion_bd.php');

    $codigo = $_GET['id'];

    $sql="DELETE FROM clientes WHERE cedula = '$codigo'";
    $query=mysqli_query($conexion,$sql);

        if($query){
            Header("location: ../clientes.php");
        }

?>