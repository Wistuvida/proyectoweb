<?php
    $servidor = "localhost";
    $usuario = "root";
    $contrasena = "";
    $base_de_datos = "pagina_web";

    // Conecta a la base de datos
    $conexion = new mysqli($servidor, $usuario, $contrasena, $base_de_datos);

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    } else {
    
    }


?>