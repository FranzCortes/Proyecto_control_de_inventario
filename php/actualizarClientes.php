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

    $sql="SELECT * FROM clientes WHERE cedula='$id'";

    $query = mysqli_query($conexion, $sql);
    $monstrar=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar clientes</title>
    <link rel="icon" type="imagen/x-icon" href="http://localhost/proyecto_control_de_inventario/assets/images/icono.png">
    <link href="http://localhost/proyecto_control_de_inventario/assets/css/editarClientes.css" rel="stylesheet" />
</head>
<body>
<h1>Editar Clientes</h1>
        <div class="formulario_tabla">
            <div class="contenedor">
                <div class="formulario_Izquierdo">
                    <form action="editarClientes.php" method="POST">

                        <input type="hidden" name="id" value="<?php echo $monstrar['id']?>"/>

                        <label for="cedula">Cedula</label>
                        <input type="number" name="cedula" id="cedula" placeholder="cedula" value="<?php echo $monstrar['cedula']?>"/><br/>
                        <label for="nombres">Nombres</label>
                        <input type="text" name="nombres" id="nombres" placeholder="nombres" value="<?php echo $monstrar['nombres']?>"/><br/>
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos" placeholder="apellidos" value="<?php echo $monstrar['apellidos']?>"/><br/>
                        <label for="correo">Correo</label>
                        <input type="email" name="correo" id="correo" placeholder="correo" value="<?php echo $monstrar['correo']?>"/><br/>
                </div>
                <div class="formulario_derecho">
                        <label for="telefono">Telefono</label>
                        <input type="number" name="telefono" id="telefono" placeholder="telefono" value="<?php echo $monstrar['telefono']?>"/><br/>
                        <label for="ciudad">Ciudad</label>
                        <input type="text" name="ciudad" id="ciudad" placeholder="ciudad" value="<?php echo $monstrar['ciudad']?>"/><br/>
                        <label for="barrio">Barrio o colonia</label>
                        <input type="text" name="barrio" id="barrio" placeholder="barrio" value="<?php echo $monstrar['barrio']?>"/><br/>
                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion" id="direccion" placeholder="direccion" value="<?php echo $monstrar['direccion']?>"/><br/>
                </div>

                <div class="boton_registrar_producto">
                        <button class="boton_registrar" type="submit" id="Registrar" value="Registrar">Registrar</button>
                        <a href="http://localhost/proyecto_control_de_inventario/clientes.php">Atrás</a>
                </div>
                    </form>
            </div>
        </div>
</body>
</html>