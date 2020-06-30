<?php
$sql = "SELECT * FROM categorias";
$conectar= pg_connect("host='localhost' dbname=categorias port=5432 user=postgres password=roma5698");
$result=pg_query($conectar,$sql);

while($fila=pg_fetch_array($result)){
echo($fila["nombre"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cargar</title>
</head>
<body>
    
</body>
</html>