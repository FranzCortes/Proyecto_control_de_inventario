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

    $sql="SELECT * FROM proveedores WHERE nit='$id'";

    $query = mysqli_query($conexion, $sql);
    $monstrar=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Proveedores</title>
    <link rel="icon" type="imagen/x-icon" href="http://localhost/proyecto_control_de_inventario/assets/images/icono.png">
    <link href="http://localhost/proyecto_control_de_inventario/assets/css/editarProveedores.css" rel="stylesheet" />
</head>
<body>
<h1>Editar Proveedores</h1>
        <div class="formulario_tabla">
            <div class="contenedor">
                <div class="formulario_Izquierdo">
                    <form action="editarProveedores.php" method="POST" autocomplete="off">

                        <input type="hidden" name="id" value="<?php echo $monstrar['id']?>"/>

                        <label for="nit">NIT</label>
                        <input type="number" name="nit" id="nit" placeholder="NIT" value="<?php echo $monstrar['nit']?>"/><br/>
                        <label for="nombre_empresa">Nombre de la empresa</label>
                        <input type="text" name="nombre_empresa" id="nombre_empresa" placeholder="Nombre empresa" value="<?php echo $monstrar['nombre_empresa']?>"/><br/>
                        <label for="nombre_proveedor">Nombre del proveedor</label>
                        <input type="text" name="nombre_proveedor" id="nombre_proveedor" placeholder="nombres proveedor" value="<?php echo $monstrar['nombre_proveedor']?>"/><br/>
                        <label for="apellido_proveedor">Apellido del proveedor</label>
                        <input type="text" name="apellido_proveedor" id="apellido_proveedor" placeholder="apellidos proveedor" value="<?php echo $monstrar['apellido_proveedor']?>"/><br/>
                </div>
                <div class="formulario_derecho">
                        <label for="correo">Correo</label>
                        <input type="email" name="correo" id="correo" placeholder="correo" value="<?php echo $monstrar['correo']?>"/><br/>
                        <label for="telefono">Telefono</label>
                        <input type="number" name="telefono" id="telefono" placeholder="telefono" value="<?php echo $monstrar['telefono']?>"/><br/>
                        <label for="ciudad">Ciudad</label>
                        <input type="text" name="ciudad" id="ciudad" placeholder="ciudad" value="<?php echo $monstrar['ciudad']?>"/><br/>
                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion" id="direccion" placeholder="direccion" value="<?php echo $monstrar['direccion']?>"/><br/>
                </div>

                <div class="boton_registrar_producto">
                        <button class="boton_registrar" type="submit" id="Registrar" value="Registrar">Registrar</button>
                        <a href="http://localhost/proyecto_control_de_inventario/proveedores.php">Atrás</a>
                </div>
                    </form>
            </div>
        </div>
</body>
</html>