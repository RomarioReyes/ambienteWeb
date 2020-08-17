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

    </div>
    <h1>Users List</h1>
    <table>
      <tbody>
        <tr><th>Name</th><th>Username</th></tr>
    <?php foreach ($users as $user) {
        echo "<tr><td>{$user->name}</td><td>{$user->username}</td></tr>";
    }?>

      </tbody>
    </table>
    </div>
</div>

</body>
</html>