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
//carga de datos por url
$id = $_GET['id'];
//ejecuta la funcion
$cate = deleteCategorias($id);
//valida resultado 
if ($cate=1) {
  header('Location: categorias.php?status=no');
}
 else {
  header('Location: categorias.php?status=error');
}
