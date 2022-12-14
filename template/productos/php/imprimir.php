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
    <title>Imprimir</title>
    <link rel="icon" type="imagen/x-icon" href="http://localhost/proyecto_control_de_inventario/assets/images/icono.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
</head>
<body>


<div class="container mt-5">
        <div class="row">
            <h1>Imprimir codigo de barras</h1>
                <div class="formulario_tabla">
                    <div class="contenedor">
                        <div class="formulario_Izquierdo">
                            <form action="" method="POST">

                                <input type="hidden" name="id" value="<?php echo $monstrar['id']?>"/>

                                <label for="codigo">Codigo</label>
                                <input type="text" name="codigo" id="codigo" value="<?php echo $monstrar['codigo']?>" readonly="true" disabled="true"/><br/>
                                <label for="producto">Producto</label>
                                <input type="text" name="producto" id="producto" value="<?php echo $monstrar['producto']?>" readonly="true" disabled="true"/><br/>

                                <label for="categoria">Categoria</label>
                                <input type="text" name="categoria" value="<?php echo $monstrar['categoria']?>" readonly="true" disabled="true">
                        </div>

                            <div class="formulario_derecho">
                                <label for="precio">Precio de compra</label>
                                <input type="number" name="precio" id="precio"  value="<?php echo $monstrar['precio']?>"readonly="true" disabled="true"/><br/>
                                <label for="venta">Precio de venta</label>
                                <input type="number" name="venta" id="venta"  value="<?php echo $monstrar['venta']?>"readonly="true" disabled="true"/><br/>
                                <label for="stock">Stock</label>
                                <input type="number" name="stock" id="stock"  value="<?php echo $monstrar['stock']?>"readonly="true" disabled="true"/><br/>
                            </div>
                                        <tr>
                                            <th><svg id="codigobarras"></svg></th>
                                            <th><svg id="codigobarras"></svg></th>
                                            <th><svg id="codigobarras"></svg></th>
                                            <th><svg id="codigobarras"></svg></th>
                                            <th><svg id="codigobarras"></svg></th>
                                            <th><svg id="codigobarras"></svg></th>
                                            <th><svg id="codigobarras"></svg></th>
                                            <th><svg id="codigobarras"></svg></th>
                                            <th><svg id="codigobarras"></svg></th>
                                            <th><svg id="codigobarras"></svg></th>
                                            <th><svg id="codigobarras"></svg></th>
                                            <th><svg id="codigobarras"></svg></th>
                                            <th><svg id="codigobarras"></svg></th>
                                            <th><svg id="codigobarras"></svg></th>
                                            <th><svg id="codigobarras"></svg></th>
                                            <th><svg id="codigobarras"></svg></th>
                                            <th><svg id="codigobarras"></svg></th>
                                            <th><svg id="codigobarras"></svg></th>
                                            <th><svg id="codigobarras"></svg></th>
                                            <th><svg id="codigobarras"></svg></th>
                                        </tr>
                            </form>
                            


<script type="text/javascript" src="http://localhost/proyecto_control_de_inventario/assets/js/JsBarcode.all.min.js"></script>
<script type="text/javascript" src="http://localhost/proyecto_control_de_inventario/assets/js/codigo2.js"></script>
</body>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        window.print();
        setTimeout(() => {
            window.location.href = "../generarCodigoDeBarra.php";
        }, 1000);
    });
</script>
</html>