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
//  nombre text not null unique,
// descripcion text not null,
// imagen text not null,
// id_categoria integer not null,
// cantidad integer not null,
// precio integer not null,

if ($_POST) {
  $nombre = $_REQUEST['nombre'];
  $descripcion = $_REQUEST['descripcion'];
  $imagen = $_REQUEST['imagen'];
  $id_categoria = $_REQUEST['categorias'];
  $cantidad = $_REQUEST['cantidad'];
  $precio = $_REQUEST['precio'];

  $producto = saveProductos($nombre, $descripcion, $imagen, $id_categoria, $cantidad, $precio);


  header('Location: crearProducto.php?status=create');
}
