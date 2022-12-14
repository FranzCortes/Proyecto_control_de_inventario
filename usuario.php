<?php
    session_start();

    if(!isset($_SESSION['usuario'])){
        echo '
            <script>
                alert("Por favor debes iniciar sesion primero");
                window.location = "http://localhost/proyecto_control_de_inventario/login.php";
            </script>
        ';
        session_destroy();
        die();
    }

    include('php/conexion_bd.php');

    $user = $_SESSION['usuario'];
    $sql = "SELECT id, cargo, nombres, apellidos, cedula, usuario, correo, telefono, direccion, barrio, contraseña, rol_id  FROM trabajadores where usuario='".$user."'";
    $resultado = $conexion->query($sql);

    while ( $data = $resultado->fetch_assoc() ){
        $id = $data['id'];
        $cargo = $data['cargo'];
        $nombres = $data['nombres'];
        $apellidos = $data["apellidos"];
        $cedula = $data["cedula"];
        $usuario = $data["usuario"];
        $correo = $data["correo"];
        $telefono = $data["telefono"];
        $direccion = $data["direccion"];
        $barrio = $data["barrio"];
        $contraseña = $data["contraseña"];
        $rol_id = $data["rol_id"];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="icon" type="imagen/x-icon" href="http://localhost/proyecto_control_de_inventario/assets/images/icono.png">
    <link rel="stylesheet" href="http://localhost/proyecto_control_de_inventario/assets/css/usuario.css">
    <link rel="stylesheet" href="assets/css/panel.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body id="body">
<header>
    <div class="icono_menu">
        <i class="bi bi-list" id="btn_open"></i>
    </div>
    <div class="logo_app">
        <img src="assets/images/logo_app_sin_fondo.png" alt="logo app"  />
    </div>
</header>
    <?php require ("layout/nav.php")  ?>
    <main>
        <h1>Perfil</h1>
        <div class="formulario_tabla">
        <div class="contenedor">
                <div class="formulario_Izquierdo">
                    <form action="" method="POST" autocomplete="off">

                    <label for="cargo">Cargo: </label>
                    <input type="text" name="cargo" id="cargo" value="<?php echo $cargo?>" disabled="true" /><br/>

                    <label for="nombre">Nombres: </label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $nombres?>" disabled="true"/><br/>
    
                    <label for="apellido">Apellidos: </label>
                    <input type="text" name="apellido" id="apellido" value="<?php echo $apellidos?>" disabled="true"/><br/>

                    <label for="cedula">Cedula: </label>
                    <input type="number" name="cedula" id="cedula" value="<?php echo $cedula?>" disabled="true"/><br/>

                    <label for="usuario">Usuario: </label>
                    <input type="text" name="usuario" id="usuario" value="<?php echo $usuario?>" disabled="true"/><br/>
                </div>

                <div class="formulario_derecho">
                    <label for="correo">Correo: </label>
                    <input type="email" name="correo" id="correo" value="<?php echo $correo?>" disabled="true"/><br/>

                    <label for="telefono">Telefono: </label>
                    <input type="number" name="telefono" id="telefono" value="<?php echo $telefono?>" disabled="true"/></br>

                    <label for="direccion">Direccion: </label>
                    <input type="text" name="direccion" id="direccion" value="<?php echo $direccion?>" disabled="true"/></br>

                    <label for="barrio">Barrio: </label>
                    <input type="text" name="barrio" id="barrio" value="<?php echo $barrio?>" disabled="true"/></br>
                </div>
            </form>
        </div>
    </div>
    </main>
    <script src="assets/js/panel.js"></script>
</body>
</html>