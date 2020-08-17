<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
    <?php echo $this->session->flashdata('error');?>
    </div>
    <h1>User Dashboard</h1>
    <div class="container">
    <nav class="nav">
      <li class="nav-item">
        <a class="nav-link active" href="#">Menu 1</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Hi <?php echo $this->session->user->name ?></a>
        <a class="nav-link disabled" href="<?php echo site_url(['user','logout']); ?>" tabindex="-1" aria-disabled="true">Logout</a>
      </li>
    </nav>

    </div>

    <form action="/practica/codeigniter31/user/register" method="POST" >
    <h1>Insertar Usuario</h1>
         <div class="form-group">
          <input type="text" name="name" class="" placeholder="Nombre" class="usuario" required >
        </div>
        <div class="form-group">
          <input type="text" class="" name="username" placeholder="Nombre Usuario" class="usuario" required >
          <input type="password" class="" name="password" placeholder="Contraseña" class="contra" required >
        </div>
        <button type="submit" name="Registrar">Registrar</button>
        <!-- <input type="submit" class="btnaceptLo" class="" name="aceptar" value="Aceptar" > -->
        
      </form>
</div>

</body>
</html>