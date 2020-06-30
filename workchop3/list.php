<?php
  // get all users from the database
  $sql = "SELECT * FROM categorias";
  $conectar= pg_connect("host='localhost' dbname=categorias port=5432 user=postgres password=roma5698");
  $result=pg_query($conectar,$sql);
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

  <title>Document</title>
</head>
<body>
<div class="container">
  
  <h1>List of Categories</h1>
    <table class="table table-light">
      <tr>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Actions</th>
      </tr>
      <tbody>
        <?php
          // loop users
          while($fila=pg_fetch_array($result)){
              echo "<tr><td>".$fila["nombre"]."</td><td>".$fila["descripcion"]."</td><td><a href=\"delete.php?id=".$fila["id"]."\">Delete</a></td></tr>";
            }
        ?>
      </tbody>
    </table>
    <?php

pg_close($conectar);
?>
<a href="index.php">Create new category</a>
</div>
</body>
</html>