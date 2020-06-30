<?php
$id=$_GET['id'];
$sql = "DELETE FROM categorias WHERE id = '$id';";
$conectar= pg_connect("host='localhost' dbname=categorias port=5432 user=postgres password=roma5698") or die ("Error de Conexion".pg_last_error());
pg_query($conectar, $sql);
header('Location: http://localhost/ambienteWeb/workchop3/list.php');
?>