<?php
require('functions.php');
$lista = cargarCategorias();
session_start();
$id = $_GET['id'];
$user = $_SESSION['user'];
if (!$user) {
    header('Location: index.php');
}
if($user['tipo']=2){
    header('Location: logeado.php');
}
$message = "";
if (!empty($_REQUEST['status'])) {
    switch ($_REQUEST['status']) {
        case 'create':
            $message = 'Creado exitosamente';
            break;
        case 'eliminado':
            $message = 'Eliminado exitosamente';
            break;
        case 'error':
            $message = 'There was a problem inserting the category';
            break;
        case 'editado':
            $message = 'Edicion exitosa';
            break;
    }
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

                    <li class="nav-item ">
                        <a class="nav-link" href="logeado.php">Estadisticas<span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="validaCategorias.php?id=1">Categorias<span class="bi bi-chevron-compact-up"></span></a>
                    </li>


                    <li class="nav-item">
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
        <div class="row">

            <h1>List of Categories</h1>
            <table class="table table-light">
                <tr>
                    <th>Nombre</th>
                    <th></th>

                </tr>
                <tbody>
                    <?php
                    if ($lista != false) {
                        while ($fila = pg_fetch_array($lista)) {
                            if ($id == $fila["id"]) {
                                $nombe=$fila['nombre'];}
                            echo "<tr><td>" . $fila["nombre"] . "</td><td><a href=\"deleteCategorias.php?id=" . $fila["id"] . "\">Delete</a></td>
                            </tr>";
                            
                        }
                    } else {
                        echo "<tr><td>sin datos.</td><td>sin datos.</td><td>sin datos.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <form action="edit-categorie.php?id=<?php echo($id);?>" method="POST" class="form-action" role="form">
                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label class="sr-only" for="">Nombre</label>
                    <p class="text-primary">Editando a <?php echo($nombe);?></p>
                    <input type="text" class="form-control" id="" required name="name" placeholder="Nombre">
                    
                </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>

                
            </form>



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