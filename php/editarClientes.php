<?php

    include('conexion_bd.php');

    $id = $_POST['id'];
    $cedula = $_POST['cedula'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo= $_POST ['correo'];
    $telefono = $_POST ['telefono'];
    $ciudad = $_POST ['ciudad'];
    $barrio = $_POST ['barrio'];
    $direccion = $_POST ['direccion'];


    $sql="UPDATE clientes SET cedula='$cedula', nombres='$nombres', 
    apellidos='$apellidos', correo='$correo', telefono='$telefono', 
    ciudad='$ciudad', barrio='$barrio', direccion='$direccion' 
    WHERE id = '$id'";
    $query=mysqli_query($conexion,$sql);

        if($query){
            Header("location: ../clientes.php");
        }
?>
