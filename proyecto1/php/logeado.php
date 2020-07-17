<?php

session_start();

$user = $_SESSION['user'];
if (!$user) {
    header('Location: index.php');
}
$message = "";
if (!empty($_REQUEST['status'])) {
    $message = $_REQUEST['message'];
    // switch($_REQUEST['status']) {
    //   case 'success':
    //     $message = 'User was added succesfully';
    //   break;
    //   case 'error':
    //     $message = 'There was a problem inserting the user';
    //   break;
    // }
}
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

                    <li class="nav-item active">
                        <a class="nav-link" href="#">Estadisticas<span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Categorias <span class="bi bi-chevron-compact-up"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="php/login.php">Productos <span class="bi bi-chevron-compact-up"></span></a>
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

        <div class="row">

            <div class="col-lg-3">
                <h1 class="my-4 text-primary">EShop</h1>
                <div class="navbar">
                    <div class="navbar-inner">
                        <div class="container">
                            <ul class="nav">
                                <li class="dropdown" id="accountmenu">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categorias</a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown" id="accountmenu">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Electricos</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Robot</a></li>
                                                <li><a href="#">Carro</a></li>
                                                <li><a href="#">Cafetera</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Casa</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Mascotas</a></li>
                                        <li><a href="#">Dulces</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                <div class="card mt-4">
                    <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">
                    <div class="card-body">
                        <h3 class="card-title">Product Name</h3>
                        <h4>$24.99</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente dicta fugit fugiat hic aliquam itaque facere, soluta. Totam id dolores, sint aperiam sequi pariatur praesentium animi perspiciatis molestias iure, ducimus!</p>
                        <button class="btn btn-primary"> Agregar </button>

                    </div>
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

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.dropdown-toggle').dropdown();
        });
    </script>
</body>

</html>