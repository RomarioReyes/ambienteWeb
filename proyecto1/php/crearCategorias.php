<?php
  require('functions.php');


  if($_POST) {
    $name = $_REQUEST['name'];
    

    $cate = saveCategorias($name);
    
    if($cate) {
      header('Location: categorias.php?status=create');
    } else {
      header('Location: categorias.php?status=error');
    }
  }