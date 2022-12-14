<?php
    include('conexion_bd.php');

    $nit = $_POST['nit'];
    $nombreEmp = $_POST['nombre_empresa'];
    $nombresPro = $_POST['nombre_proveedor'];
    $apellidosPro = $_POST['apellido_proveedor'];
    $correo= $_POST ['correo'];
    $telefono = $_POST ['telefono'];
    $ciudad = $_POST ['ciudad'];
    $direccion = $_POST ['direccion'];

    $consulta = "INSERT INTO proveedores(nit,nombre_empresa,nombre_proveedor,apellido_proveedor,correo,telefono,ciudad,direccion)
                VALUES ('$nit', '$nombreEmp','$nombresPro', '$apellidosPro', '$correo', '$telefono', '$ciudad','$direccion')";

    $query=mysqli_query($conexion,$consulta);

    if($query){
        Header("location: ../proveedores.php");
    }

?>