<?php
require('functions.php');
session_start();

$user = $_SESSION['user'];
if (!$user) {
    header('Location: index.php');
}
if($user['tipo']=2){
    header('Location: logeado.php');
}
$id = $_GET['id'];
if ($_POST) {
    $nombre = $_REQUEST['nombre'];
    $descripcion = $_REQUEST['descripcion'];
    $imagen = $_REQUEST['imagen'];
    $id_categoria = $_REQUEST['categorias'];
    $cantidad = $_REQUEST['cantidad'];
    $precio = $_REQUEST['precio'];

    $producto = editProductos($id,$nombre, $descripcion, $imagen, $id_categoria, $cantidad, $precio);
    if ($producto) {
        header('Location: productosAdmin.php?status=editado');
    } else {
        header('Location: productosAdmin.php?status=error');
    }
}
