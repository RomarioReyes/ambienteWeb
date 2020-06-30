<?php
  $message = "";
  if(!empty($_REQUEST['status'])) {
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
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

  <title>Document</title>
</head>
<body>
<div class="container">
  
    <div class="msg">
      <?php echo $message; ?>
    </div>
    <h1>Registrar Categorias</h1>
    <form action="signup.php" method="POST" class="form-inline" role="form">
      <div class="form-group">
        <label class="sr-only" for="">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Nombre">
      </div>
      <div class="form-group">
        <label class="sr-only" for="">Descripcion</label>
        <input type="text" class="form-control" name="descripcion" placeholder="Descripcion">
      </div>

      <input type="submit" class="btn btn-primary" value="Submit"></input>
      <a href="list.php">Ver lista</a>
    </form>
</div>

</body>
</html>