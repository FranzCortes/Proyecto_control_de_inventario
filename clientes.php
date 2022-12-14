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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="assets/css/panel.css"/>
    <link rel="icon" type="imagen/x-icon" href="http://localhost/proyecto_control_de_inventario/assets/images/icono.png">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="http://localhost/proyecto_control_de_inventario/assets/css/nuevoCliente.css" rel="stylesheet" />
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
    <h1>Agregar Clientes</h1>
        <div class="formulario_tabla">
            <div class="contenedor">
                <div class="formulario_Izquierdo">
                    <form action="php/nuevoCliente.php" method="POST" autocomplete="off">
                        <label for="cedula">Cedula</label>
                        <input type="number" name="cedula" id="cedula" placeholder="cedula" required="true"/><br/>
                        <label for="nombres">Nombres</label>
                        <input type="text" name="nombres" id="nombres" placeholder="nombres" required="true"/><br/>
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos" placeholder="apellidos" required="true"/><br/>
                        <label for="correo">Correo</label>
                        <input type="email" name="correo" id="correo" placeholder="correo" required="true"/><br/>
                </div>
                <div class="formulario_derecho">
                        <label for="telefono">Telefono</label>
                        <input type="number" name="telefono" id="telefono" placeholder="telefono" required="true"/><br/>
                        <label for="ciudad">Ciudad</label>
                        <input type="text" name="ciudad" id="ciudad" placeholder="ciudad" required="true"/><br/>
                        <label for="barrio">Barrio o colonia</label>
                        <input type="text" name="barrio" id="barrio" placeholder="barrio" required="true"/><br/>
                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion" id="direccion" placeholder="direccion" required="true"/><br/>
                </div>

                <div class="boton_registrar_clientes">
                        <button class="boton_registrar" type="submit" id="Registrar" value="Registrar">Registrar</button>
                </div>
                    </form>
            </div>
        </div>
    

    <h1>Lista de clientes</h1>

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
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Ciudad</th>
            <th>Barrio o colonia</th>
            <th>Direccion</th>
            <th colspan="2" >opciones</th>
        </tr>
    </thead>
    <tbody class="body_table">
        <?php
            $sql=("SELECT * FROM clientes");
            $result=mysqli_query($conexion, $sql);
        ?>
        <?php
            while($monstrar=mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $monstrar['cedula']?></td>
            <td><?php echo $monstrar['nombres']?></td>
            <td><?php echo $monstrar['apellidos']?></td>
            <td><?php echo $monstrar['correo']?></td>
            <td><?php echo $monstrar['telefono']?></td>
            <td><?php echo $monstrar['ciudad']?></td>
            <td><?php echo $monstrar['barrio']?></td>
            <td><?php echo $monstrar['direccion']?></td>
            <td>
                <a href="php/actualizarClientes.php?id=<?php echo $monstrar['cedula']?>" class="boton_eliminar">
                    <i class="bi bi-pencil-square"></i>
                </a>
            </td>
            <td><a href="php/eliminarCliente.php?id=<?php echo $monstrar['cedula']?>" class="boton_eliminar"><i class="bi bi-trash3-fill"></i></a></td>
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
    <script src="http://localhost/proyecto_control_de_inventario/assets/js/buscador.js"></script>
    <script src="http://localhost/proyecto_control_de_inventario/assets/js/ventana_modal.js"></script>
    <script src="assets/js/panel.js"></script>
</body>
</html>
