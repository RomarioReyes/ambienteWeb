<?php
require('functions.php');
$id = $_GET['id'];
if ($_POST) {
    $name = $_REQUEST['name'];}
$cate = editarCategorias($id,$name);

if ($cate) {
  header('Location: categorias.php?status=editado');
} else {
  header('Location: categorias.php?status=error');
}