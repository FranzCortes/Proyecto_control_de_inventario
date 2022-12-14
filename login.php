<?php
    session_start();

    if (isset($_SESSION['usuario'])){
        header("location: inicio.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISCodi</title>
    <link rel="icon" type="imagen/x-icon" href="http://localhost/proyecto_control_de_inventario/assets/images/icono.png">
    <link rel="stylesheet" href="assets/css/login.css"/>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="login">
        <img class="icono_usuario" src="assets/images/logo_app_sin_fondo.png" alt="Icono usuario"/>
        <form method="POST" action="php/login_usuario.php" >

            <div class="titulo_formulario">
                <legend>Inicia sesión</legend>
            </div>
            <div class="cuerpo_formulario usuario">
                <label for="usuario">Usuario</label>
                <br/>
                <input type="text" id="usuario" name="usuario" placeholder="Usuario" required="true"/>
                <br/>
            </div>
            <div class="cuerpo_formulario contraseña">
                <label for="contraseña">Contraseña</label>
                <br/>
                <input type="password" id="contraseña" name="contraseña" placeholder="contraseña" required="true"/>
                <br/>
            </div>
            <input class="boton_enviar" type="submit" id="Enviar"/>
        </form>
    </div>
</div>
<script src="js/script.js"></script>
</body>
</html>