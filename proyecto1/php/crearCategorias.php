<?php
  require('functions.php');
  session_start();

  $user = $_SESSION['user'];
  if (!$user) {
      header('Location: index.php');
  }
  if($user['tipo']=2){
      header('Location: logeado.php');
  }

  if($_POST) {
    $name = $_REQUEST['name'];
    

    $cate = saveCategorias($name);
    
    if($cate) {
      header('Location: categorias.php?status=create');
    } else {
      header('Location: categorias.php?status=error');
    }
  }