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
    <title>Generar codigo de barras</title>
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
        <h1>Generar codigo de barra</h1>

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
            <th>Generar Codigo</th>
            <th>Imprimir</th>
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
                <a href="php/codigoBarras.php?id=<?php echo $monstrar['codigo']?>" class="codigo_barras">
                    <i class="bi bi-upc"></i>
                </a>
            </td>
            <td>
                <a href="php/imprimir.php?id=<?php echo $monstrar['codigo']?>" class="codigo_barras">
                    <i class="bi bi-filetype-pdf"></i>
                </a>
            </td>
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