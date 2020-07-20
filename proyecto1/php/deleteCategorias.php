<?php
require('functions.php');
$id = $_GET['id'];
$cate = deleteCategorias($id);

if ($cate) {
  header('Location: categorias.php?status=eliminado');
} else {
  header('Location: categorias.php?status=error');
}
