<?php
$connection = pg_connect("host='localhost' dbname=AmbienteWebP1 port=5432 user=postgres password=roma5698")
    or die("Error de Conexion" . pg_last_error());


$num=$argv[1];
$sql = "SELECT* from productos where cantidad <'$num'";
$result = pg_query($connection, $sql);
$admin = "romarioarroliga@gmail.com";
$Motivo = "Informe productos con stock bajo";
$emisor = "romaproyectocorreos@gmail.com";
if (pg_num_rows($result) > 0) {


    $product = $result;
    $txt = "ID producto-----nombre------cantidad" . "\r\n";
} else {
    $txt = "NO hay productos con bajo stock";
}
while ($fila = pg_fetch_array($result)) {
    $txt .= $fila["id"] . " ----------- " . $fila["nombre"] . " --------- " . $fila["cantidad"] . "\r\n";
}
pg_close($connection);
mail($admin, $Motivo, $txt);
