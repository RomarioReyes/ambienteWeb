<?php

include ("conex.php");

if (isset($_POST['register'])) {
    if (strlen($_POST['nombre']) >= 1 && strlen($_POST['apellido']) >= 1 
    && strlen($_POST['telefono']) >= 1 && strlen($_POST['correo']) >= 1) {
	    $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $telefono = trim($_POST['telefono']);
        $correo = trim($_POST['correo']);
	    $consulta = "INSERT INTO datos(nombre, apellido, telefono, correo) VALUES ('$name','$apellido','$telefono','$correo')";
        $resultado = mysqli_query($conex,$consulta);
        if ($resultado) {
            ?>
            <h3 class="ok"Registrado con exito</h3>
            <?php
        }else {
            ?>
            <h3 class="bad">Error al registrarse</h3>
            <?php
        }
    }   else {
	    	?> 
	    	<h3 class="bad">Complete los espacios vacios</h3>
           <?php
    }
    
}


?>

