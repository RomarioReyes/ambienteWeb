<?php
require('functions.php');
session_start();

$user = $_SESSION['user'];
if (!$user) {
    header('Location: index.php');
}
if($user['tipo']==2){
    header('Location: logeado.php');
}
$id = $_GET['id'];
$produ = deleteProductos($id);

if ($produ) {
  header('Location: productosAdmin.php?status=eliminado');
} else {
  header('Location: productosAdmin.php?status=error');
}