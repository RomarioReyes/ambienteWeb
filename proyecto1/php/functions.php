<?php


function getConnection()
{
  $connection = pg_connect("host='localhost' dbname=AmbienteWebP1 port=5432 user=postgres password=roma5698") or die("Error de Conexion" . pg_last_error());

  return $connection;
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
function saveProductos($name, $descripcion, $imagen, $id_categoria, $cantidad, $precio)
{

  $conn = getConnection();
  $sql = "INSERT INTO productos(nombre, descripcion, imagen, id_categoria, cantidad, precio) VALUES ( '$name','$descripcion', 
  '$imagen', '$id_categoria', '$cantidad', '$precio')";

  $rs = pg_query($conn, $sql);
  pg_close($conn);
  return $rs;
}
function cargarProductos($id_categoria){
  $conn = getConnection();
  if($id_categoria==0){
    $sql = " SELECT * FROM productos";
    $rs = pg_query($conn, $sql);
    pg_close($conn);
    return $rs;
  }
  $sql = " SELECT * FROM productos WHERE id_categoria='$id_categoria'";
  $rs = pg_query($conn, $sql);
  pg_close($conn);
  return $rs;

}
function cargarProducto($id){
  $conn = getConnection();
  $sql = " SELECT * FROM productos WHERE id='$id'";
  $rs = pg_query($conn, $sql);
  
  pg_close($conn);
  return $rs;
}






function editProductos($id,$nombre, $descripcion, $imagen, $id_categoria, $cantidad, $precio){
  $conn = getConnection();
  $sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', 
  imagen='$imagen', id_categoria='$id_categoria', cantidad='$cantidad', precio='$precio' WHERE id='$id'";
  $result = pg_query($conn, $sql);
  pg_close($conn);
  return $result;

}
function deleteProductos($id){
  $conn = getConnection();
  $sql="DELETE FROM PRODUCTOS WHERE id =$id";
  $result = pg_query($conn, $sql);
  pg_close($conn);
  return $result;
}

//carrito
function saveCarrito($id_usuario, $id_producto, $fecha)
{

  $conn = getConnection();
  $sql = "INSERT INTO productos(id_usuario, id_producto, fecha) VALUES ('$id_usuario','$id_producto','$fecha')";

  $rs = pg_query($conn, $sql);
  pg_close($conn);
  return $rs;
}

//usuarios
function saveClient($name, $ape, $num, $corr, $dir, $ced, $contra)
{

  $conn = getConnection();
  $sql = "INSERT INTO usuarios(nombre, apellidos, numero, correo, direccion, cedula, contra, tipo) VALUES ('$name', '$ape', '$num', '$corr',
    '$dir', '$ced', '$contra', 2)";

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
//estadisticas admin
function cantClientes(){
  $conn = getConnection();
  $sql = "SELECT * FROM usuarios WHERE tipo=2";
  $result = pg_query($conn, $sql);
  return pg_num_rows($result);
}
function cantPvendidos(){
  $conn = getConnection();
  $sql = "SELECT * FROM compras";
  $result = pg_query($conn, $sql);
  return pg_num_rows($result);
}
function totalVentas(){
  $conn = getConnection();
  $sql = "SELECT * FROM compras";
  $count = 0;
  $result = pg_query($conn, $sql);
  if (pg_num_rows($result) > 0) {
    
    while ($fila = pg_fetch_array($result)) {
      $id_p=$fila["id_producto"];
      $sql = "SELECT precio FROM productos WHERE id = '$id_p'";
      $count+= pg_query($conn, $sql);
    }
    pg_close($conn);
    
    
  }

  return $count;
}
