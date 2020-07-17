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
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

  <title>Inicio</title>
</head>

<body>
  <div class="msg">
    <?php echo $message; ?>
  </div>
  <h1> Bienvenido <?php echo $user["nombre"];
                  echo " " . $user["apellidos"] ?> </h1>


  <nav class="nav">
    <?php if ($user["tipo"] == 1) { ?>



      <h2>Creacion de clientes</h2>
      <form action="create.php" method="POST" class="form-inline" role="form">

        <div class="form-group">
          <label class="sr-only" for="">nombre</label>
          <input type="text" class="form-control" id="" required name="name" placeholder="nombre">
        </div>
        <div class="form-group">
          <label class="sr-only" for="">Apellidos</label>
          <input type="text" class="form-control" id="" required name="apellidos" placeholder="Apellidos">
        </div>
        <div class="form-group">
          <label class="sr-only" for="">Cedula</label>
          <input type="text" class="form-control" id="" required name="cedula" placeholder="Cedula(solo numeros)">
        </div>
        <div class="form-group">
          <label class="sr-only" for="">Contraseña</label>
          <input type="password" class="form-control" id="" required name="contra" placeholder="Contraseña">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>

      </form>
      </div>
    <?php } ?>

    <a href="logout.php">Logout</a>
  </nav>
</body>

</html>