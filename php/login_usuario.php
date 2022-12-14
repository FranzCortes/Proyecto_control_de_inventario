<?php
    session_start();

    include 'conexion_bd.php';

    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $contraseñaEncrip = hash('sha512', $contraseña);

    $_SESSION['usuario'] = $usuario;

    // Validacion de datos para el login
    $consulta = ("SELECT * FROM trabajadores WHERE usuario = '$usuario' AND contraseña = '$contraseñaEncrip'");
    $validacion = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($validacion) > 0){
        $_SESSION['usuario'] = $usuario;
        header ("location: http://localhost/proyecto_control_de_inventario/usuario.php?id=Franz%20Cortes.php");
        exit;
    }else{
        echo'
            <script>
                alert("Usuario o contraseña incorrecto, vuelve a intentarlo");
                window.location = "../login.php";
            </script>
        ';
        exit;
    }
?>