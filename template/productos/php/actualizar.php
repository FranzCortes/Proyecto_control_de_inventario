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

    $sql="SELECT * FROM productos WHERE codigo='$id'";
    
    $query = mysqli_query($conexion, $sql);
    $monstrar=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Productos</title>
    <link rel="icon" type="imagen/x-icon" href="http://localhost/proyecto_control_de_inventario/assets/images/icono.png">
    <link href="http://localhost/proyecto_control_de_inventario/assets/css/editarProducto.css" rel="stylesheet" />
</head>
<body>


<div class="container mt-5">
        <div class="row">
            <h1>Editar producto</h1>
                <div class="formulario_tabla">
                    <div class="contenedor">
                        <div class="formulario_Izquierdo">
                            <form action="editar.php" method="POST">

                                <input type="hidden" name="id" value="<?php echo $monstrar['id']?>"/>

                                <label for="codigo">Codigo</label>
                                <input type="text" name="codigo" id="codigo" value="<?php echo $monstrar['codigo']?>"/><br/>
                                <label for="producto">Producto</label>
                                <input type="text" name="producto" id="producto" value="<?php echo $monstrar['producto']?>"/><br/>

                                <label for="categoria">Categoria</label>
                                    <select id="categoria" name="categoria" value="<?php echo $monstrar['categoria']?>">
                                        <option value="ninguno" >Ninguno</option>
                                        <option value="Aseo hogar">Aseo Hogar</option>
                                        <option value="Aseo personal">Aseo Personal</option>
                                        <option value="Bebidas y snack">Bebidas y snack</option>
                                        <option value="Carnes" >Carnes</option>
                                        <option value="Embutidos">Embutidos</option>
                                        <option value="Enlatados">Enlatados</option>
                                        <option value="Frutas y verguras" >Frutas y Verguras</option>
                                        <option value="Granos y cereales" >Granos y cereales</option>
                                        <option value="Lacteo" >Lacteos</option>
                                        <option value="Panaderia y reposteria" >Panaderia y reposteria</option>
                                    </select>
                        </div>

                                <div class="formulario_derecho">
                                <label for="precio">Precio de compra</label>
                                <input type="number" name="precio" id="precio"  value="<?php echo $monstrar['precio']?>"/><br/>
                                <label for="venta">Precio de venta</label>
                                <input type="number" name="venta" id="venta"  value="<?php echo $monstrar['venta']?>"/><br/>
                                <label for="stock">Stock</label>
                                <input type="number" name="stock" id="stock"  value="<?php echo $monstrar['stock']?>"/><br/>
                    </div>
            
                                <div class="boton_registrar_producto">
                                    <button class="boton_registrar" type="submit" id="Registrar" value="Registrar">Registrar</button>
                                    <a href="http://localhost/proyecto_control_de_inventario/template/productos/nuevoProducto.php">Atrás</a>
                                </div>

                            </form>
        </div>
</div>



</body>
</html>

    
