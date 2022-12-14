<?php

    include('conexion_bd.php');

    $id = $_POST['id'];
    $cargo = $_POST ['cargo'];
    $nombre = $_POST ['nombre'];
    $apellido = $_POST ['apellido'];
    $cedula = $_POST ['cedula'];
    $usuario = $_POST ['usuario'];
    $correo = $_POST ['correo'];
    $telefono = $_POST ['telefono'];
    $direccion = $_POST ['direccion'];
    $barrio = $_POST ['barrio'];
    $rol_id = $_POST ['rol_id'];

    $sql = "UPDATE trabajadores set cargo = '$cargo', nombres = '$nombre', apellidos = '$apellido', cedula = '$cedula',
            usuario = '$usuario', correo = '$correo', telefono = '$telefono', direccion = '$direccion', telefono = '$telefono',
            direccion = '$direccion', barrio = '$barrio' WHERE id = '$id'";
    $query=mysqli_query($conexion,$sql);

        if($query){
            Header("location: ../trabajadoresRegistrados.php");  
        }
?>