<?php
require('functions.php');
session_start();

$user = $_SESSION['user'];
if (!$user) {
    header('Location: index.php');
}
$cantClientes = cantClientes();
$cantPvendidos = cantPvendidos();
$totalVentas = totalVentas();
$lista = cargarCategorias();
$id_usu=$user['id'];
$totalProductosC= totalProductosC($id_usu);

$sumaTotalP=montoTotalC($id_usu);
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
                        <a class="nav-link" href="logeado.php">Estadisticas<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <?php if ($user["tipo"] == 1) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="validaCategorias.php?id=1">Categorias<span class="bi bi-chevron-compact-up"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="productosAdmin.php">Productos <span class="bi bi-chevron-compact-up"></span></a>
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

                        <li class="nav-item">
                            <a class="nav-link" href="productos.php?id=0">Productos <span class="bi bi-chevron-compact-up"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="carrito.php">Carrito <span class="bi bi-chevron-compact-up"></span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="historial.php">Historial de compras<span class="bi bi-chevron-compact-up"></span></a>
                        </li>


                    <?php } ?>
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

        <div class="row">
            <div class="col-lg-10">

                <div class="card mt-4 bg-sucess">
                    <?php if ($user["tipo"] == 1) { ?>
                        <div class="card-body">

                            <h3 class="card-title text-danger text-center">Estadisticas Administrativas</h3>
                            <p class="text-primary text-uppercase">Cantidad de clientes: <?php echo ($cantClientes); ?></p>
                            <p class="text-info text-uppercase">Cantidad productos vendidos: <?php echo ($cantPvendidos); ?></p>
                            <p class="text-primary text-uppercase">Monto total ventas: <?php echo ($totalVentas); ?></p>

                        </div>
                    <?php } else { ?>
                        <div class="card-body">
                            <h3 class="card-title text-danger text-center">Estadisticas cliente</h3>
                            <br>
                            <p class="text-primary text-uppercase">Total de productos adquiridos por el cliente: <?php echo ($totalProductosC); ?></p>
                            <p class="text-info text-uppercase">Monto total de compras realizadas por el cliente: <?php echo ($sumaTotalP); ?></p>
                            <br>
                                 
                        </div>
                    <?php } ?>
                </div>

            </div>



        </div>

    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
    
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; EShop 2020</p>
        </div>
        
    </footer>

    

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.dropdown-toggle').dropdown();
        });
    </script>
</body>

</html>