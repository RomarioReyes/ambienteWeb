<?php
require('functions.php');
if ($_POST) {
  //recupera datos
  $username = $_REQUEST['username'];
  $password = $_REQUEST['password'];
//ejecuta el logeo
  $user = authenticate($username, $password);
//valida si el usuario esta logueado y si tiene permisos para ver esta pagina
  if ($user) {
    session_start();
    $_SESSION['user'] = $user;

    header('Location: logeado.php');
  } else {
    header('Location: login.php?status=login');
  }
}
