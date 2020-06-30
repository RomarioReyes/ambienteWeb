<?php
  if($_POST) {
    $name = $_REQUEST['name'];
    $descripcion = $_REQUEST['descripcion'];
    

    $sql = "INSERT INTO categorias(nombre, descripcion) VALUES ('$name', '$descripcion')";
    

    $conectar= pg_connect("host='localhost' dbname=categorias port=5432 user=postgres password=roma5698") or die ("Error de Conexion".pg_last_error());

    pg_query($conectar, $sql);
    pg_close($conectar);
    header('Location: http://localhost/ambienteWeb/workchop3/?status=success&message=Category was created');
  } else {
    header('Location: http://localhost/ambienteWeb/workchop3/?status=error&message=There was an error');
  }