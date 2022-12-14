<?php

    include('conexion_bd.php');

    $id = $_POST['id'];
    $nit = $_POST['nit'];
    $nombreEmp = $_POST['nombre_empresa'];
    $nombresPro = $_POST['nombre_proveedor'];
    $apellidosPro = $_POST['apellido_proveedor'];
    $correo= $_POST ['correo'];
    $telefono = $_POST ['telefono'];
    $ciudad = $_POST ['ciudad'];
    $direccion = $_POST ['direccion'];


    $sql="UPDATE proveedores SET nit = '$nit', nombre_empresa='$nombreEmp', nombre_proveedor='$nombresPro',
            apellido_proveedor='$apellidosPro', correo='$correo', telefono='$telefono', ciudad='$ciudad',
            direccion='$direccion' WHERE id = '$id'";
    $query=mysqli_query($conexion,$sql);

        if($query){
            Header("location: ../proveedores.php");
        }
?>