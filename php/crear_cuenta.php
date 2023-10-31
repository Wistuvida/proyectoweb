<?php
// Conexión a la base de datos (como se mostró en el paso anterior)
require_once('conexion.php');

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido_paterno = $_POST["apellido_paterno"];
    $apellido_materno = $_POST["apellido_materno"];
    $correo = $_POST["correo"];
    $contrasena = md5($_POST["contrasena"]);

    // Prepara la consulta para insertar datos
    $consulta = "INSERT INTO usuario(nombre, apellido_paterno, apellido_materno, correo, contrasena) 
        VALUES ('$nombre', '$apellido_paterno', '$apellido_materno', '$correo', '$contrasena')";

    // Ejecuta la consulta
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    if ($conexion->query($consulta) === TRUE) {
        header("Location: ../index.php?mensaje=Cuenta creada de manera exitosa");
        exit(); // Asegura que el script se detenga aquí
    } else {
        echo "Error al insertar el registro: " . $conexion->error;
    }
}

// Cierra la conexión
$conexion->close();
?>