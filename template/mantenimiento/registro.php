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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="http://localhost/proyecto_control_de_inventario/assets/css/panel.css"/>
    <link rel="icon" type="imagen/x-icon" href="http://localhost/proyecto_control_de_inventario/assets/images/icono.png">
    <link rel="stylesheet" href="http://localhost/proyecto_control_de_inventario/assets/css/registro.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body id="body">
<header>
    <div class="icono_menu">
        <i class="bi bi-list" id="btn_open"></i>
    </div>
    <div class="logo_app">
        <img src="http://localhost/proyecto_control_de_inventario/assets/images/logo_app_sin_fondo.png" alt="logo app"  />
    </div>
</header>

    <?php require ("../layout/subnav.php") ?>

<main>
    <h1>Registro Trabajador</h1>
    <div class="formulario_tabla">
        <div class="contenedor">
                <div class="formulario_Izquierdo">
                    <form action="php/registro_trabajador.php" method="POST" autocomplete="off">
                    <label for="cargo">Cargo</label>
                    <input type="text" name="cargo" id="cargo" placeholder="Escribir Cargo" required="true"/><br/>
                    <label for="nombre">Nombres</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Escribir Nombres" required="true"/><br/>
    
                    <label for="apellido">Apellidos</label>
                    <input type="text" name="apellido" id="apellido" placeholder="Escribir Apellidos" required="true"/><br/>

                    <label for="cedula">Cedula</label>
                    <input type="number" name="cedula" id="cedula" placeholder="cedula" required="true"/><br/>

                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario" placeholder="Usuario" required="true"/><br/>

                    <label for="correo">Correo</label>
                    <input type="email" name="correo" id="correo" placeholder="Escribir Correo"/><br/>
                </div>

                <div class="formulario_derecho">
                    <label for="telefono"> Telefono</label>
                    <input type="number" name="telefono" id="telefono" placeholder="telefono" required="true"/></br>

                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" id="direccion" placeholder="Direccion" required="true"/></br>

                    <label for="barrio">Barrio</label>
                    <input type="text" name="barrio" id="barrio" placeholder="barrio" required="true"/></br>

                    <lable for="contraseña">Contraseña</lable>
                    <input type="password" name="contraseña" id="Contraseña" required="true"/></br>

                    <lable for="rol_id">Rol </br> 
                        1-Administrador</br>
                        2-Supervisor</br>
                        3-Cajero</br>
                        4-Bodega</br>
                        5-Sistemas</br>
                    </lable>
                    <input type="number" name="rol_id" id="rol_id" required="true" placeholder="Ej: 1"/></br>
                </div>

                <div class="boton_registrar">
                    <button class="boton_registrar" type="submit" id="Registrar" value="Registrar">Registrar</button>
                </div>

            </form>
        </div>
    </div>
    
    </main>
    <script src="http://localhost/proyecto_control_de_inventario/assets/js/panel.js"></script>
</body>
</html>
