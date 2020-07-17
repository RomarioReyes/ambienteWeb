<?php


function getConnection() {
  $connection = pg_connect("host='localhost' dbname=categorias port=5432 user=postgres password=roma5698")or die ("Error de Conexion".pg_last_error());
  
  return $connection;
}


function saveClient($name, $ape, $ced, $contra) {
    
    $conn = getConnection();
    $sql = "INSERT INTO usuarios(tipo, nombre, apellidos, cedula, contrasena) VALUES (2, '$name', '$ape', '$ced', '$contra')";

       $rs= pg_query($conn, $sql);
        pg_close($conn);
      return $rs;
}





function authenticate($username, $password){
  $conn = getConnection();
  $sql = "SELECT * FROM usuarios WHERE cedula = '$username' AND contrasena = '$password'";
  $result=pg_query($conn,$sql);


  if( pg_num_rows($result) > 0 ){
    
    pg_close($conn);
    $fila=pg_fetch_array($result);
    return $fila;
    
  }
  
  pg_close($conn);
  return false;
}

