<?php
require('functions.php');
session_start();

$user = $_SESSION['user'];
if (!$user) {
    header('Location: index.php');
}
if($user['tipo']==2){
    header('Location: logeado.php');
}
$message = "";
if (!empty($_REQUEST['status'])) {
    switch ($_REQUEST['status']) {
        case 'creat':
            $message = 'Creado exitosamente';
            break;
        case 'error':
            $message = 'There was a problem inserting product';
            break;
    }
}
$id = $_GET['id'];
$producto = cargarProductoE($id);
$cate = cargarCategoria($producto["id_categoria"]);
$listaC = cargarCategorias();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Principal</title>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Bienvenido <?php echo $user["nombre"];
                                                        echo " " . $user["apellidos"] ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item ">
                        <a class="nav-link" href="logeado.php">Estadisticas<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <?php if ($user["tipo"] == 1) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="validaCategorias.php?id=1">Categorias<span class="bi bi-chevron-compact-up"></span></a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <div class="col-lg-3">

                                <div class="navbar">
                                    <div class="navbar-inner">
                                        <div class="container">
                                            <ul class="nav">
                                                <li class="dropdown" id="accountmenu">
                                                    <a class="dropdown-toggle text-muted" data-toggle="dropdown" href="#">Categorias</a>
                                                    <ul class="dropdown-menu">
                                                        <?php
                                                        if ($lista != false) {
                                                            while ($fila = pg_fetch_array($lista)) {
                                                                echo "<li><a href=\"productos.php?id=" . $fila["id"] . " \">\"" . $fila["nombre"] . "\"</a></li>";
                                                            }
                                                        } else {
                                                            echo "<tr><td>sin datos.</td><td>sin datos.</td><td>sin datos.</td></tr>";
                                                        }
                                                        ?>
                                                        <a href=""></a>



                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="productosAdmin.php">Productos <span class="bi bi-chevron-compact-up"></span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Cerrar sesion <span class="bi bi-chevron-compact-up"></span></a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <H1 class="text-center text-primary">EShop</H1>


    </div>
    <div class="msg">
        <?php echo $message ?>
    </div>
    <!-- nombre text not null unique,
descripcion text not null,
imagen text not null,
id_categoria integer not null,
cantidad integer not null,
precio integer not null, -->
    <form action="edit-prod.php?id=<?php echo ($id); ?>" method="POST" class="form-action" role="form" id="product">

        </div>

        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <label class="sr-only" for="">Nombre</label>
            <input type="text" class="form-control" id="" value="<?php echo $producto['nombre'] ?>" required name="nombre" placeholder="Nombre">
        </div>

        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <label class="sr-only" for="">Descripcion</label>
            <input type="text" class="form-control" id="" value="<?php echo $producto['descripcion'] ?>" required name="descripcion" placeholder="Descripcion">
        </div>


        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <label class="sr-only" for="">Imagen</label>
            <input type="text" class="form-control" id="" value="<?php echo $producto['imagen'] ?>" required name="imagen" placeholder="Url imagen">
        </div>

        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <label for="categorias" class="text-primary">Categorias:</label>
            <select name="categorias" id="categorias" form="product">
                <?php

                if ($listaC != false) {
                    while ($fila = pg_fetch_array($listaC)) {
                        if ($fila["id"] === $cate["id"]) {
                            echo "<option class=" . "text-primary" . " value=" . $fila["id"] . " selected="."selected"." >" . $fila["nombre"] . "</option>";
                        } else {
                            echo "<option class=" . "text-primary" . " value=" . $fila["id"] . " >" . $fila["nombre"] . "</option>";
                        }
                    }
                }

                ?>
                <!-- "<li><a href=\"productos.php?id=" . $fila["id"] . " \">\"" . $fila["nombre"] . "\"</a></li>";
                <option value="volvo">Volvo</option> -->

            </select>
        </div>

        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <label class="sr-only" for="">Cantidad</label>
            <input type="number" class="form-control" id="" value="<?php echo $producto['cantidad'] ?>" required name="cantidad" placeholder="Cantidad a agregar">
        </div>

        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <label class="sr-only" for="">precio</label>
            <input type="number" class="form-control" id="" value="<?php echo $producto['precio'] ?>" required name="precio" placeholder="Precio en $">
        </div>




        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </ul>


    </form>
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; EShop 2020</p>
        </div>
        <!-- /.container -->
    </footer>

    <!----jumbotrom----->

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.dropdown-toggle').dropdown();
        });
    </script>
</body>

</html>