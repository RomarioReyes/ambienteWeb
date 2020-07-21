<?php
require('functions.php');
session_start();
$user = $_SESSION['user'];
if($user['tipo']=1){
    header('Location: logeado.php');
}
$id = $_GET['id'];
$id_usu=$_GET['id_usu'];
$añade=saveCarrito($id_usu, $id, "hoy");
if ($añade) {
    header('Location: verMas.php?status=añadido&id='.$id);
} else {
    header('Location: productosAdmin.php?status=error');
}
