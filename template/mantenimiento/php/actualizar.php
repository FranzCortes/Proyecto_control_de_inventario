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
    };
    
    include('conexion_bd.php');

    $id=$_GET['id'];

    $sql="SELECT * FROM trabajadores WHERE cargo='$id'";
    
    $query = mysqli_query($conexion, $sql);
    $monstrar=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Trabajador</title>
    <link rel="icon" type="imagen/x-icon" href="http://localhost/proyecto_control_de_inventario/assets/images/icono.png">
    <link href="http://localhost/proyecto_control_de_inventario/assets/css/editarTrabajador.css" rel="stylesheet" />
</head>
<body>
<h1>Editar datos de Trabajadores</h1>
<div class="formulario_tabla">
        <div class="contenedor">
                <div class="formulario_Izquierdo">
                    <form action="editar.php" method="POST" autocomplete="off">
                    
                    <input type="hidden" name="id" value="<?php echo $monstrar['id']?>"/>

                    <label for="cargo">Cargo</label>
                    <input type="text" name="cargo" id="cargo" value="<?php echo $monstrar['cargo']?>" /><br/>

                    <label for="nombre">Nombres</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $monstrar['nombres']?>" /><br/>
    
                    <label for="apellido">Apellidos</label>
                    <input type="text" name="apellido" id="apellido" value="<?php echo $monstrar['apellidos']?>" /><br/>

                    <label for="cedula">Cedula</label>
                    <input type="number" name="cedula" id="cedula" value="<?php echo $monstrar['cedula']?>" /><br/>

                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario" value="<?php echo $monstrar['usuario']?>"/><br/>


                </div>

                <div class="formulario_derecho">
                    <label for="correo">Correo</label>
                    <input type="email" name="correo" id="correo" value="<?php echo $monstrar['correo']?>"/><br/>

                    <label for="telefono"> Telefono</label>
                    <input type="number" name="telefono" id="telefono" value="<?php echo $monstrar['telefono']?>" /></br>

                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" id="direccion" value="<?php echo $monstrar['direccion']?>" /></br>

                    <label for="barrio">Barrio</label>
                    <input type="text" name="barrio" id="barrio" value="<?php echo $monstrar['barrio']?>" /></br>

                    <lable for="rol_id">Rol </br> 
                        1-Administrador</br>
                        2-Supervisor</br>
                        3-Cajero</br>
                        4-Bodego</br>
                        5-Sistemas</br>
                    </lable>
                    <input type="number" name="rol_id" id="rol_id" required="true" placeholder="Ej: 1" value="<?php echo $monstrar['rol_id']?>"/></br>
                </div>
                <div class="boton_registrar">
                    <button class="boton_registrar" type="submit" id="Registrar" value="Registrar">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>