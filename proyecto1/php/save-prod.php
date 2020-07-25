<?php
require('functions.php');
session_start();
//valida si el usuario esta logueado y si tiene permisos para ver esta pagina
$user = $_SESSION['user'];
if (!$user) {
    header('Location: index.php');
}
if($user['tipo']=2){
    header('Location: logeado.php');
}
//recoge datos del formulario
if ($_POST) {
  $nombre = $_REQUEST['nombre'];
  $descripcion = $_REQUEST['descripcion'];
  $imagen = $_REQUEST['imagen'];
  $id_categoria = $_REQUEST['categorias'];
  $cantidad = $_REQUEST['cantidad'];
  $precio = $_REQUEST['precio'];
//ejecuta la funcion
  $producto = saveProductos($nombre, $descripcion, $imagen, $id_categoria, $cantidad, $precio);
  if ($producto) {
    header('Location: crearProducto.php?status=create');
  } else {
    header('Location: crearProducto.php?status=existe');
  }

 
}
