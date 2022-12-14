<?php
    include('conexion_bd.php');

    $codigo = $_GET['id'];

    $sql="DELETE FROM proveedores WHERE nit = '$codigo'";
    $query=mysqli_query($conexion,$sql);

        if($query){
            Header("location: ../proveedores.php");
        }

?>