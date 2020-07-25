<?php
require('functions.php');
session_start();
//valida si el usuario esta logueado y si tiene permisos para ver esta pagina
$user = $_SESSION['user'];
if (!$user) {
    header('Location: index.php');
}
if($user['tipo']==1){
    header('Location: logeado.php');
}
//carga de datos
$id_usu=$user['id'];
$id = $_GET['id'];
$cate = deleteElementoCarrito($id);
//valida el reultado y lo envia por url
if ($cate) {
    header('Location: carrito.php?status=eliminado');
  } else {
    header('Location: carrito.php?status=error');
  }



?>