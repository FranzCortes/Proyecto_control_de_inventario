<?php
    include('conexion_bd.php');

    $codigo = $_POST['codigo'];
    $producto = $_POST['producto'];
    $categoria = $_POST['categoria'];
    $precio= $_POST ['precio'];
    $venta = $_POST ['venta'];
    $stock = $_POST ['stock'];

    $consulta = "INSERT INTO productos(codigo,producto,categoria,precio,venta,stock)
                VALUES ('$codigo','$producto','$categoria','$precio','$venta','$stock')";

        // Verificar productos con codigo repedito
        $consulta2 = ("SELECT * FROM productos WHERE codigo = '$codigo'");
        $verificacion = mysqli_query($conexion, $consulta2);
    
        if (mysqli_num_rows($verificacion) > 0){
            echo '
                <script>
                alert("Este codigo de producto ya esta registrado");
                window.location = "../nuevoProducto.php";
                </script>
            ';
            exit();
        }

        $ejecutar = mysqli_query($conexion, $consulta);

        if($ejecutar){
            echo "
            <script>
                alert('Producto agregado correctamente');
                window.location = '../nuevoProducto.php';
            </script>
            ";
        }else{
            echo "
            <script>
                alert('Error al crear usuario, intentalo de nuevo');
                window.location = '../nuevoProducto.php';
            </script>
            ";
        }
        mysqli_close($conexion);
?>
