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
if ($_POST) {
    $name = $_REQUEST['name'];}
$cate = editarCategorias($id,$name);

if ($cate) {
  header('Location: categorias.php?status=editado');
} else {
  header('Location: categorias.php?status=error');
}