<?php
//destruye la sesion y lo envia a la pagina principal deslogeado
  session_start();
  session_destroy();
  header('Location: ../index.php');