<?php
require('functions.php');
session_start();
//valida si el usuario esta logueado y si tiene permisos para ver esta pagina
$user = $_SESSION['user'];
if (!$user) {
    header('Location: index.php');
}

if($user['tipo']==2){
    header('Location: logeado.php');
}
//pregunta si se envia algun mensaje de otro pagina y lo guarda en una variable para imprimir despues
$message = "";
if (!empty($_REQUEST['status'])) {
    switch ($_REQUEST['status']) {
        case 'eliminado':
            $message = 'Eliminado exitosamente';
            break;
        case 'error':
            $message = 'There was a problem inserting the category';
            break;
        case 'editando':
            $message = 'Editado exitosamente';
            break;
    }
}

$lista = cargarProductos(0);
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
                                                                
                                                                    echo "<li><a href=\"productos.php?id=" . $fila["id"] . " \">" . $fila["nombre"] . "</a></li>";
                                                                
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
        <div class="msg">
            <?php echo $message; ?>
        </div>
        <div class="row ">
            <div class="col-lg-6"id="productoAdmin">
                <!-- href=\"editarCategoria.php?id=" . $fila["id"] . " \" -->
                <div class="card mt-4 bg-sucess">
                    <?php
                    if ($lista != false) {
                        while ($fila = pg_fetch_array($lista)) {

                            echo ("<div class=\"card-body\">");
                            echo ("<h3 class=\"card-title\">" . $fila["nombre"] . "</h3>");
                            echo ("<h3 class=\"card-title\">" . "Cantidad Restante: " . $fila["cantidad"] . "</h3>");
                            echo ("<h4>$" . $fila["precio"] . "</h4>");
                            echo ("<a href=\"editarProducto.php?id=" . $fila["id"] . " \" class=\"btn btn-info\"> Editar </a>");
                            echo ("<a class=\"btn btn-primary\" href=\"eliminarProducto.php?id=" . $fila["id"] . " \"> eliminar </a>");
                            echo ("</div>");
                        }
                    }
                    ?>



                </div>
                <a href="crearProducto.php" class="btn btn-primary">Crear</a>  
            </div>

        </div>
        
    </div>
    <!-- /.container -->

    <!-- Footer -->
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