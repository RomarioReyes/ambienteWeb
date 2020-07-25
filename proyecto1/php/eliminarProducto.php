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
//carga de datos
$id = $_GET['id'];
$produ = deleteProductos($id);
//valida resultado y envia resultado por url
if ($produ) {
  header('Location: productosAdmin.php?status=eliminado');
} else {
  header('Location: productosAdmin.php?status=error');
}