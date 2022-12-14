<div class="menu" id="menuid">
        <div class="opciones_menu">
            <ul>
                <li>
                    <a href="usuario.php?id=<?php echo $_SESSION['usuario']; ?>" class="selected">
                        <div class="opciones">
                            <i class="bi bi-person-circle" title="usuario" ></i>
                            <h4><?php echo $_SESSION['usuario']; ?></h4>
                        </div>
                    </a>
                </li>
                <li class="list_item list_item--click">
                        <div class="opciones list_button list_button--click">
                            <i class="bi bi-boxes" title="productos"></i>
                            <h4>Productos</h4>
                            <i class="bi bi-chevron-right list_arrow"></i>
                        </div>
                    <ul class="list_show">
                        <li class="lista_inside">
                            <div class="icono_submenu">
                                <i class="bi bi-clipboard2-check"></i>
                            </div>
                            <div class="link_submenu">
                            <a href="template/productos/inventario.php" class="inventario nav_link nav_link--inside">Inventario</a>
                            </div>
                        </li>
                        <li class="lista_inside">
                            <div class="icono_submenu">
                                <i class="bi bi-plus-circle"></i>
                            </div>
                            <div class="link_submenu">
                            <a href="template/productos/nuevoProducto.php" class="nav_link nav_link--inside">Nuevo Producto</a>
                            </div>
                        </li>
                        <li class="lista_inside">
                            <div class="icono_submenu">
                                <i class="bi bi-upc"></i>
                            </div>
                            <div class="link_submenu">
                                <a href="template/productos/generarCodigoDeBarra.php" class="nav_link nav_link--inside">Generar codigo de barra </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="clientes.php">
                        <div class="opciones">
                            <i class="bi bi-people" title="clientes"></i>
                            <h4>Clientes</h4>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="proveedores.php">
                        <div class="opciones">
                            <i class="bi bi-truck" title="proveedores"></i>
                            <h4>Proveedores</h4>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="vender.php">
                        <div class="opciones">
                            <i class="bi bi-tags" title="vender"></i>
                            <h4>Vender</h4>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="ventas.php">
                        <div class="opciones">
                            <i class="bi bi-bag-check" title="ventas"></i>
                            <h4>Ventas</h4>
                        </div>
                    </a>
                </li>
                <li class="list_item list_item--click">
                        <div class="opciones list_button list_button--click">
                            <i class="bi bi-tools" title="mantenimiento"></i>
                            <h4>Mantenimiento</h4>
                            <i class="bi bi-chevron-right list_arrow"></i>
                        </div>
                    <ul class="list_show">
                        <li class="lista_inside">
                            <div class="icono_submenu">
                                <i class="bi bi-clipboard2-check"></i>
                            </div>
                            <div class="link_submenu">
                            <a href="template/mantenimiento/registro.php" class="inventario nav_link nav_link--inside">Registro</a>
                            </div>
                        </li>
                        <li class="lista_inside">
                            <div class="icono_submenu">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="link_submenu">
                            <a href="template/mantenimiento/trabajadoresRegistrados.php" class="nav_link nav_link--inside">Trabajadores registrados</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="php/cerrar_sesion.php">
                        <div class="opciones">
                            <i class="bi bi-box-arrow-left"></i>
                            <h4>Cerrar sesion</h4>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>