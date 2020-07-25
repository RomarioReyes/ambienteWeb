<?php
require('functions.php');
session_start();
//valida si el usuario esta logueado y si tiene permisos para ver esta pagina

$user = $_SESSION['user'];
if (!$user) {
  header('Location: index.php');
}
if ($user['tipo'] == 2) {
  header('Location: logeado.php');
}
//recupera datos del form
if ($_POST) {
  $name = $_REQUEST['name'];

//ejecuta funcion para guardar categorias nuevas
  $cate = saveCategorias($name);
//valida resultado y envia resultado por url
  if ($cate) {
    header('Location: categorias.php?status=create');
  } else {
    header('Location: categorias.php?status=error');
  }
}
