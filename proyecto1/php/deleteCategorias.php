<?php
require('functions.php');
$id = $_GET['id'];
$cate = deleteCategorias($id);

if ($cate=1) {
  header('Location: categorias.php?status=no');
}
 else {
  header('Location: categorias.php?status=error');
}
