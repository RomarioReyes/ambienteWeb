<?php
require('functions.php');
session_start();
//valida si el usuario esta logueado y si tiene permisos para ver esta pagina
$user = $_SESSION['user'];
if (!$user) {
    header('Location: index.php');
}
if($user['tipo']=2){
    header('Location: logeado.php');
}
//recoge datos del formulario
if ($_POST) {
  $name = $_REQUEST['name'];
  $ape = $_REQUEST['lastname'];
  $num = $_REQUEST['number'];
  $corr = $_REQUEST['email'];
  $dir = $_REQUEST['adress'];
  $ced = $_REQUEST['cedula'];
  $contra = $_REQUEST['password'];
//ejecuta funcion de guardar usuario
  $client = saveClient($name, $ape, $num, $corr, $dir, $ced, $contra);
  //valida resultado y lo envia por url
  if ($client) {
    $user = authenticate($ced, $contra);
    session_start();
    $_SESSION['user'] = $user;
    header('Location: logeado.php');
  } else {
    header('Location: usu-registro.php?status=error&message=Error');
  }
}
