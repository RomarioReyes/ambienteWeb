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
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <ul class="nav">
                    <a class="brand" href="#">w3resource</a>
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li class="dropdown" id="accountmenu">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tutorials<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">PHP</a></li>
                            <li><a href="#">MySQL</a></li>
                            <li class="divider"></li>
                            <li><a href="#">JavaScript</a></li>
                            <li><a href="#">HTML5</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <h1>Dropdown Example</h1>
    </div>
    <!-- /.container -->

    <!-- Footer -->


    <!----jumbotrom----->

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript">
           $(document).ready(function () {
               $('.dropdown-toggle').dropdown();
           });
      </script> 
</body>

</html>