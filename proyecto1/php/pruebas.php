
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
<form action="pruebas2.php" id="carform">
  <label for="fname">Firstname:</label>
  <input type="text" id="fname" name="fname">
  <input type="submit">
</form>

<label for="cars">Choose a car:</label>
<select name="cars" id="cars" form="carform">
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="opel">Opel</option>
  <option value="audi">Audi</option>
</select> 

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