<?php
require('functions.php');
$id = $_GET['id'];
if ($_POST) {
    $nombre = $_REQUEST['nombre'];
    $descripcion = $_REQUEST['descripcion'];
    $imagen = $_REQUEST['imagen'];
    $id_categoria = $_REQUEST['categoria'];
    $cantidad = $_REQUEST['cantidad'];
    $precio = $_REQUEST['precio'];

    $producto = editProductos($id,$nombre, $descripcion, $imagen, $id_categoria, $cantidad, $precio);
    if ($producto) {
        header('Location: productosAdmin.php?status=editado');
    } else {
        header('Location: productosAdmin.php?status=error');
    }
}
