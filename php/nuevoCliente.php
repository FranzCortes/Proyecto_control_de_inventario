<?php
    include('conexion_bd.php');

    $cedula = $_POST['cedula'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo= $_POST ['correo'];
    $telefono = $_POST ['telefono'];
    $ciudad = $_POST ['ciudad'];
    $barrio = $_POST ['barrio'];
    $direccion = $_POST ['direccion'];

    $consulta = "INSERT INTO clientes(cedula,nombres,apellidos,correo,telefono,ciudad,barrio,direccion)
                VALUES ('$cedula', '$nombres', '$apellidos', '$correo', '$telefono', '$ciudad', '$barrio','$direccion')";

    $query=mysqli_query($conexion,$consulta);

    if($query){
        Header("location: ../clientes.php");
    }

?>