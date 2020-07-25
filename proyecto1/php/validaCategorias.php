<?php
//valida la categoria
$id=$_GET['id'];
if($id>0){
    header('Location: categorias.php');
}
?>