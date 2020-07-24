<?php
require('functions.php');
session_start();

if ($_SESSION && $_SESSION['user']) {
    //user already logged in
    header('Location: php/logeado.php');
}

$message = "";
if (!empty($_REQUEST['status'])) {
    switch ($_REQUEST['status']) {
        case 'login':
            $message = 'User does not exists';
            break;
        case 'error':
            $message = 'There was a problem inserting the user';
            break;
    }
}
$id = $_GET['id'];
$lista = cargarCategorias();
$listaP = cargarProductos($id);
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
            <a class="navbar-brand" href="#">Bienvenido</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li>
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
                                                            echo "<li><a href=\"productosLogout.php?id=" . $fila["id"] . " \">" . $fila["nombre"] . "</a></li>";
                                                        }
                                                    } else {
                                                        echo "<tr><td>sin datos.</td><td>sin datos.</td><td>sin datos.</td></tr>";
                                                    }
                                                    ?>
                                                    
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="usu-registro.php">Registrarse <span class="bi bi-chevron-compact-up"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">loguearse <span class="bi bi-chevron-compact-up"></span></a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
        <H1 class="text-center text-primary">EShop</H1>
        <div class="row">


            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                <div class="card mt-4">

                    <?php
                    if ($listaP != false) {
                        while ($fila = pg_fetch_array($listaP)) {
                            echo ("<img class=\"card-img-top img-fluid\" src=\"" . $fila["imagen"] . "\"  >");
                            echo ("<div class=\"card-body\">");
                            echo ("<h3 class=\"card-title\">" . $fila["nombre"] . "</h3>");
                            echo ("<h4>$" . $fila["precio"] . "</h4>");
                            echo ("<button class=\"btn btn-primary\"> ver mas </button>");
                            echo ("</div>");
                        }
                    }
                    
                        
                       
                        
                    
                    ?>
                </div>
                <!-- /.card -->


                <!-- /.card -->

            </div>
            <!-- /.col-lg-9 -->

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

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.dropdown-toggle').dropdown();
        });
    </script>
</body>

</html>