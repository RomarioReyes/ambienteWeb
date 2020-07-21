<?php
require('functions.php');
$id = $_GET['id'];
$produ = deleteProductos($id);

if ($produ) {
  header('Location: productosAdmin.php?status=eliminado');
} else {
  header('Location: productosAdmin.php?status=error');
}