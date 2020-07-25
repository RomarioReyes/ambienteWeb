<?php

//predunta si el usuario esta logueado y si tiene los permisos para ver esta pagina
require('functions.php');
session_start();
$user = $_SESSION['user'];
if($user['tipo']==1){
    header('Location: logeado.php');
}
//toma el valor de id enviado por url
$id = $_GET['id'];
$id_usu=$_GET['id_usu'];
//ejecuta el save carrito y valida si se inserto o no, luego envia el estado por url
$añade=saveCarrito($id_usu, $id, "hoy");
if ($añade) {
    header('Location: verMas.php?status=añadido&id='.$id);
} else {
    header('Location: productosAdmin.php?status=error');
}
