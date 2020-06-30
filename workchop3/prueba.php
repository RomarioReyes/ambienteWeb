<?php
//conectamos con el servidor
$conectar= pg_connect("host='localhost' dbname=categorias port=5432 user=postgres password=roma5698") or die ("Error de Conexion".pg_last_error());
//verificamos la conexion
if(!$conectar){
 echo "No se pudo conectar con el servidor";
}
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];

$sql ="INSERT INTO categorias (nombre,descripcion) VALUES ('Culantro','Legumbre')";

$ejecutar=pg_query($conectar, $sql);

if(!$ejecutar){
 echo "Hubo un error al guardar los datos";
}else{
echo "datos guardados";
} 
?>