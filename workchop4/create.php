<?php
  require('functions.php');


  if($_POST) {
    $name = $_REQUEST['name'];
    $ape = $_REQUEST['apellidos'];
    $ced = $_REQUEST['cedula'];
    $contra = $_REQUEST['contra'];

    $client = saveClient($name, $ape, $ced, $contra);
    if($client){

        header('Location: inicio.php?status=success&message=Client was created');
    } else {
      header('Location: inicio.php?status=error&message=There was an error');
    }
    }
    
    
  