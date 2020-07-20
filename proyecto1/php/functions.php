<?php


function getConnection()
{
  $connection = pg_connect("host='localhost' dbname=AmbienteWebP1 port=5432 user=postgres password=roma5698") or die("Error de Conexion" . pg_last_error());

  return $connection;
}




function saveClient($name, $ape, $num, $corr, $dir, $ced, $contra)
{

  $conn = getConnection();
  $sql = "INSERT INTO usuarios(nombre, apellidos, numero, correo, direccion, cedula, contra, tipo) VALUES ('$name', '$ape', '$num', '$corr',
    '$dir', '$ced', '$contra', 2)";

  $rs = pg_query($conn, $sql);
  pg_close($conn);
  return $rs;
}
// categorias
function saveCategorias($name)
{

  $conn = getConnection();
  $sql = "INSERT INTO categorias(nombre) VALUES ('$name')";

  $rs = pg_query($conn, $sql);
  pg_close($conn);
  return $rs;
}
function deleteCategorias($id)
{
  $conn = getConnection();
  $sql = "SELECT * FROM productos WHERE id_categoria = $id";
  $result = pg_query($conn, $sql);


  if (pg_num_rows($result) > 0) {
    pg_close($conn);
    return " ERROR La categoria tiene productos asociados";
  }
  $sql = "DELETE FROM categorias WHERE id =$id";
  $result = pg_query($conn, $sql);
  pg_close($conn);
  return "Eliminado Exitosamente";
}
function cargarCategorias()
{
  $conn = getConnection();
  $sql = "SELECT * FROM categorias";
  $result = pg_query($conn, $sql);
  if (pg_num_rows($result) > 0) {

    pg_close($conn);

    return $result;
  }

  pg_close($conn);
  return false;
};
function editarCategorias($id, $nombre)
{
  $conn = getConnection();
  $sql = "UPDATE categorias SET nombre='$nombre' WHERE id='$id'";
  $result = pg_query($conn, $sql);
  pg_close($conn);
  return $result;
}



//productos
function saveProductos($sku, $name, $descripcion, $imagen, $id_categoria, $cantidad, $precio)
{

  $conn = getConnection();
  $sql = "INSERT INTO productos(nombre, descripcion, imagen, id_categoria, cantidad, precio) VALUES ( '$name','$descripcion', 
  '$imagen', '$id_categoria', '$cantidad', '$precio')";

  $rs = pg_query($conn, $sql);
  pg_close($conn);
  return $rs;
}
function saveCarrito($id_usuario, $id_producto, $fecha)
{

  $conn = getConnection();
  $sql = "INSERT INTO productos(id_usuario, id_producto, fecha) VALUES ('$id_usuario','$id_producto','$fecha')";

  $rs = pg_query($conn, $sql);
  pg_close($conn);
  return $rs;
}






function authenticate($username, $password)
{
  $conn = getConnection();
  $sql = "SELECT * FROM usuarios WHERE cedula = '$username' AND contra = '$password'";
  $result = pg_query($conn, $sql);


  if (pg_num_rows($result) > 0) {

    pg_close($conn);
    $fila = pg_fetch_array($result);
    return $fila;
  }

  pg_close($conn);
  return false;
}
