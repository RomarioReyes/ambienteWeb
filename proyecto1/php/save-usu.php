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

if ($_POST) {
  $name = $_REQUEST['name'];
  $ape = $_REQUEST['lastname'];
  $num = $_REQUEST['number'];
  $corr = $_REQUEST['email'];
  $dir = $_REQUEST['adress'];
  $ced = $_REQUEST['cedula'];
  $contra = $_REQUEST['password'];

  $client = saveClient($name, $ape, $num, $corr, $dir, $ced, $contra);
  if ($client) {
    $user = authenticate($ced, $contra);
    session_start();
    $_SESSION['user'] = $user;
    header('Location: logeado.php');
  } else {
    header('Location: usu-registro.php?status=error&message=Error');
  }
}
