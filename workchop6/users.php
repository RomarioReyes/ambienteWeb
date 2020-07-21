<?php

    include_once 'C:\xampp\htdocs\ambienteWeb\workchop6\users.php';

    $username = $argv[1];
    $pass = $argv[2];
    $dbname = $argv[3];
    $host = $argv[4];
    $table = $argv[5];
    $file = $argv[6];

    try{
        $conexion = new PDO("mysql:host=$host;dbname=$dbname",$username,$pass);
    }catch(PDOException $e){
        echo "Error en la conexion";
        die();  
    }

    $file = fopen($argv[6],"w");

    $users = $conexion->prepare("SELECT * FROM $table");
    $users->execute();
    $users = $users->fetchAll();
    foreach ($users as $user) {
        fwrite($file, $user["name"] . "," . $user["lastname"] . "," . $user["phone"] . "," . $user["email"] . "," . "\r\n");
    }
    echo "Guardado ecitosamente";

    fclose($file);
?>