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
    
    include('php/conexion_bd.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto</title>
    <link rel="icon" type="imagen/x-icon" href="http://localhost/proyecto_control_de_inventario/assets/images/icono.png">
    <link href="http://localhost/proyecto_control_de_inventario/assets/css/nuevoProductos.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://localhost/proyecto_control_de_inventario/assets/css/panel.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"/>
    
    
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
    <h1>Agregar productos</h1>
        <div class="formulario_tabla">
            <div class="contenedor">
                <div class="formulario_Izquierdo">
                    <form action="php/insertar.php" method="POST" autocomplete="off">
                        <label for="codigo">Codigo</label>
                        <input type="text" name="codigo" id="codigo" placeholder="codigo del producto" required="true"/><br/>
                        <label for="producto">Producto</label>
                        <input type="text" name="producto" id="producto" placeholder="producto" required="true"/><br/>
                        <label for="categoria">Categoria</label>
                            <select id="categoria" name="categoria">
                                <option value="ninguno" selected="true">Ninguno</option>
                                <option value="aseo hogar">Aseo Hogar</option>
                                <option value="aseo personal">Aseo Personal</option>
                                <option value="bebidas y snack">Bebidas y snack</option>
                                <option value="carnes">Carnes</option>
                                <option value="embutidos">Embutidos</option>
                                <option value="enlatados">Enlatados</option>
                                <option value="frutas y verguras">Frutas y Verguras</option>
                                <option value="granos y cereales">Granos y cereales</option>
                                <option value="lacteo">Lacteos</option>
                                <option value="panaderia y reposteria">Panaderia y reposteria</option>
                            </select>
                </div>
                <div class="formulario_derecho">
                        <label for="precio">Precio de compra</label>
                        <input type="number" name="precio" id="precio" placeholder="precio" required="true"/><br/>
                        <label for="venta">Precio de venta</label>
                        <input type="number" name="venta" id="venta" placeholder="venta" required="true"/><br/>
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" id="stock" placeholder="stock" required="true"/><br/>
                </div>

                <div class="boton_registrar_producto">
                        <button class="boton_registrar" type="submit" id="Registrar" value="Registrar">Registrar</button>
                </div>
                    </form>
            </div>
        </div>


    <h1>Productos</h1>

<div class="container-fluid">
    <div class="buscador">
        <form class="d-flex">
            <label for="buscador">Buscar producto: </label>
            <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" name="buscador" id="buscador" placeholder="Buscardor">
            <hr>
        </form>
    </div>
</div> 
<br>
<table class="table table table-striped table-dark table_id ">
    <thead class="head_table">
        <tr>
            <th>Codigo</th>
            <th>Producto</th>
            <th>Categoria</th>
            <th>Precio de compra</th>
            <th>Precio de venta</th>
            <th>Stock</th>
            <th colspan="2" >opciones</th>
        </tr>
    </thead>
    <tbody class="body_table"> 
        <?php
            $sql=("SELECT * FROM productos");
            $result=mysqli_query($conexion, $sql);
        ?>
        <?php
            while($monstrar=mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $monstrar['codigo']?></td>
            <td><?php echo $monstrar['producto']?></td>
            <td><?php echo $monstrar['categoria']?></td>
            <td>$ <?php echo $monstrar['precio']?></td>
            <td>$ <?php echo $monstrar['venta']?></td>
            <td><?php echo $monstrar['stock']?></td>
            <td>
                <a href="php/actualizar.php?id=<?php echo $monstrar['codigo']?>" class="boton_eliminar">
                    <i class="bi bi-pencil-square"></i>
                </a>
            </td>
            <td><a href="php/eliminar.php?id=<?php echo $monstrar['codigo']?>" class="boton_eliminar"><i class="bi bi-trash3-fill"></i></a></td>
        </tr>
        <?php                                
        }                            
        ?>
    </tbody>  
</table>
</div>
</div>
</div>
    </main>
    <script src="http://localhost/proyecto_control_de_inventario/assets/js/panel.js"></script>
    <script src="http://localhost/proyecto_control_de_inventario/assets/js/buscador.js"></script>
    <script src="http://localhost/proyecto_control_de_inventario/assets/js/ventana_modal.js"></script>
</body>

</html>