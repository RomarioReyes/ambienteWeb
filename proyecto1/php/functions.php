<?php

// funcion que da conexion a la base de datos
function getConnection()
{
  $connection = pg_connect("host='localhost' dbname=AmbienteWebP1 port=5432 user=postgres password=roma5698") or die("Error de Conexion" . pg_last_error());

  return $connection;
}

// categorias

//Funcion que toma el nombre de la categoria y la inserta
function saveCategorias($name)
{

  $conn = getConnection();
  $sql = "INSERT INTO categorias(nombre) VALUES ('$name')";

  $rs = pg_query($conn, $sql);
  pg_close($conn);
  return $rs;
}
//funcion que elimina categoria, primero valida que no tenga productos asociados
function deleteCategorias($id)
{
  $conn = getConnection();
  $sql = "SELECT * FROM productos WHERE id_categoria = $id";
  $result = pg_query($conn, $sql);


  if (pg_num_rows($result) > 0) {
    pg_close($conn);
    return 1;
  }
  $sql = "DELETE FROM categorias WHERE id =$id";
  $result = pg_query($conn, $sql);
  pg_close($conn);
  return 2;
}
//funcion que carga todas las categorias para mostrarlas
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
//funcion para cargar un categoria en concreto
function cargarCategoria($id)
{
  $conn = getConnection();
  $sql = "SELECT * FROM categorias WHERE id='$id'";
  $result = pg_query($conn, $sql);
  if (pg_num_rows($result) > 0) {

    pg_close($conn);
    $cate = pg_fetch_array($result);
    return $cate;
  }

  pg_close($conn);
  return false;
};
//funcion que edita la categoria que se envia por parametros
function editarCategorias($id, $nombre)
{
  $conn = getConnection();
  $sql = "UPDATE categorias SET nombre='$nombre' WHERE id='$id'";
  $result = pg_query($conn, $sql);
  pg_close($conn);
  return $result;
}



//productos

//funcion que gurda los productos en la base de datos
function saveProductos($name, $descripcion, $imagen, $id_categoria, $cantidad, $precio)
{

  $conn = getConnection();
  $sql = "INSERT INTO productos(nombre, descripcion, imagen, id_categoria, cantidad, precio) VALUES ( '$name','$descripcion', 
  '$imagen', '$id_categoria', '$cantidad', '$precio')";

  $rs = pg_query($conn, $sql);
  pg_close($conn);
  return $rs;
}

//funcion que trae todos los productos asociados a la categoria
function cargarProductos($id_categoria)
{
  $conn = getConnection();
  if ($id_categoria == 0) {
    $sql = " SELECT * FROM productos where activo='true'";
    $rs = pg_query($conn, $sql);
    pg_close($conn);
    return $rs;
  }
  $sql = " SELECT * FROM productos WHERE id_categoria='$id_categoria' and activo='true'";
  $rs = pg_query($conn, $sql);
  pg_close($conn);
  return $rs;
}
//funcion que trae el producto para llenar el form y asi editar lo que se necesite
function cargarProductoE($id)
{
  $conn = getConnection();
  $sql = " SELECT * FROM productos WHERE id='$id'";
  $rs = pg_query($conn, $sql);
  $fila = pg_fetch_array($rs);
  pg_close($conn);
  return $fila;
}
//carga el producto por el id
function cargarProducto($id)
{
  $conn = getConnection();
  $sql = " SELECT * FROM productos WHERE id='$id'";
  $rs = pg_query($conn, $sql);

  pg_close($conn);
  return $rs;
}





//funcion que edita los productos los actualiza al estado desactivado
function editProductos($id, $nombre, $descripcion, $imagen, $id_categoria, $cantidad, $precio)
{
  $conn = getConnection();
  $sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', 
  imagen='$imagen', id_categoria='$id_categoria', cantidad='$cantidad', precio='$precio' WHERE id='$id'";
  $result = pg_query($conn, $sql);
  pg_close($conn);
  return $result;
}
//funcion que elimina producto mediante el id
function deleteProductos($id)
{
  $conn = getConnection();
  $sql = "UPDATE productos SET activo='false' WHERE id =$id";
  $result = pg_query($conn, $sql);
  pg_close($conn);
  return $result;
}

//carrito

//funcion que agrega al carrito 
function saveCarrito($id_usuario, $id_producto, $fecha)
{

  $conn = getConnection();
  $sql = "INSERT INTO carrito(id_usuario, id_producto, fecha) VALUES ('$id_usuario','$id_producto',now()";

  $rs = pg_query($conn, $sql);
  pg_close($conn);
  return $rs;
}
//funcion que carga los productos del usuario en el carrito
function cargarCarrito($id){
  $conn = getConnection();
  $sql = "SELECT p.id, p.nombre,p.imagen, p.id_categoria, p.cantidad, p.precio, p.activo, p.descripcion, c.id as id_carrito
  FROM productos p INNER JOIN carrito c ON p.id = c.id_producto 
  INNER JOIN usuarios u ON u.id = '$id' WHERE p.activo='true'";
  $rs = pg_query($conn, $sql);
  pg_close($conn);
  return $rs;

}
//funcion que borra productos del carrito
function deleteElementoCarrito($id)
{
  $conn = getConnection();
  $sql = " DELETE  FROM carrito  WHERE id ='$id'";
  $result = pg_query($conn, $sql);
  pg_close($conn);
  return $result;

}
//funcion que hace checkout
function checkout($id,$id_){



}


//usuarios

//funcion que guarda cientes
function saveClient($name, $ape, $num, $corr, $dir, $ced, $contra)
{

  $conn = getConnection();
  $sql = "INSERT INTO usuarios(nombre, apellidos, numero, correo, direccion, cedula, contra, tipo) VALUES ('$name', '$ape', '$num', '$corr',
    '$dir', '$ced', '$contra', 2)";

  $rs = pg_query($conn, $sql);
  pg_close($conn);
  return $rs;
}

//funcion que autentifica cedula y contraseña para poder loguearse
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

//retorna la cantidad de clientes en la base de datos
function cantClientes()
{
  $conn = getConnection();
  $sql = "SELECT * FROM usuarios WHERE tipo=2";
  $result = pg_query($conn, $sql);
  return pg_num_rows($result);
}
//retorna la cantidad de productos vendidos
function cantPvendidos()
{
  $conn = getConnection();
  $sql = "SELECT * FROM compras";
  $result = pg_query($conn, $sql);
  return pg_num_rows($result);
}
//retorna la monto total de ventas
function totalVentas()
{
  $conn = getConnection();
  $sql = "SELECT * FROM compras";
  $count = 0;
  $result = pg_query($conn, $sql);
  if (pg_num_rows($result) > 0) {

    while ($fila = pg_fetch_array($result)) {
      $id_p = $fila["id_producto"];
      $sql = "SELECT precio FROM productos WHERE id = '$id_p'";
      $count += pg_query($conn, $sql);
    }
    pg_close($conn);
  }
  return $count;
}
// Total de productos adquiridos por el cliente
// //estadisticas clientes
// Monto total de compras realizadas por el cliente

//estadisticas cliente

//retorna el tota de productos comprados por el usuario
function totalProductosC($id)
{
  $conn = getConnection();
  $sql = "SELECT * FROM compras Where id_usuario='$id'";
  $result = pg_query($conn, $sql);
  pg_close($conn);
  return pg_num_rows($result);
};
//retorna el monto total de compras del usuario
function montoTotalC($id)
{
  $conn = getConnection();
  $sql = "SELECT * FROM compras WHERE id_usuario='$id'";
  $count = 0;
  $result = pg_query($conn, $sql);
  if (pg_num_rows($result) > 0) {

    while ($fila = pg_fetch_array($result)) {
      $id_p = $fila["id_producto"];
      $sql = "SELECT precio FROM productos WHERE id = '$id_p'";
      $count += pg_query($conn, $sql);
    }
    pg_close($conn);
  }
  return $count;
};
