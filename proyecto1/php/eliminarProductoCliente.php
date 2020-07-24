<?php
require('functions.php');
session_start();

$user = $_SESSION['user'];
if (!$user) {
    header('Location: index.php');
}
if($user['tipo']==1){
    header('Location: logeado.php');
}


$id_usu=$user['id'];
$id = $_GET['id'];
$cate = deleteElementoCarrito($id);
if ($cate) {
    header('Location: carrito.php?status=eliminado');
  } else {
    header('Location: carrito.php?status=error');
  }



?>