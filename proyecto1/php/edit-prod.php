<?php
require('functions.php');
session_start();
//valida si el usuario esta logueado y si tiene permisos para ver esta pagina
$user = $_SESSION['user'];
if (!$user) {
    header('Location: index.php');
}
if($user['tipo']==2){
    header('Location: logeado.php');
}
//recuperacion de datos de url y del form
$id = $_GET['id'];
if ($_POST) {
    $nombre = $_REQUEST['nombre'];
    $descripcion = $_REQUEST['descripcion'];
    $imagen = $_REQUEST['imagen'];
    $id_categoria = $_REQUEST['categorias'];
    $cantidad = $_REQUEST['cantidad'];
    $precio = $_REQUEST['precio'];
//ejecuta funcion de editar productos
    $producto = editProductos($id,$nombre, $descripcion, $imagen, $id_categoria, $cantidad, $precio);
    //valida resultado y envia el resultado por url
    if ($producto) {
        header('Location: productosAdmin.php?status=editado');
    } else {
        header('Location: productosAdmin.php?status=error');
    }
}
