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
$cate = deleteCategorias($id);

if ($cate=1) {
  header('Location: categorias.php?status=no');
}
 else {
  header('Location: categorias.php?status=error');
}
