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
//recupera datos
$id = $_GET['id'];
if ($_POST) {
    $name = $_REQUEST['name'];}
 //ejecuta funcion para cargar datos   
$cate = editarCategorias($id,$name);
//valida resultado
if ($cate) {
  header('Location: categorias.php?status=editado');
} else {
  header('Location: categorias.php?status=error');
}