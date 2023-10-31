<?php
require_once('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    $consulta = "SELECT * FROM usuario WHERE correo='$correo' AND contrasena='$contrasena'";

    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows == 1) {
        $fila = $resultado->fetch_assoc(); // Obtener la fila de la consulta
        $nombre_usuario = $fila['nombre']; // Obtener el nombre del usuario

        session_start();
        $_SESSION['correo'] = $correo;
        $_SESSION['nombre'] = $nombre_usuario; // Guardar el nombre en la sesión
        header("Location: ../html/Inicio.php");
        exit();
    } else {
        echo "Correo o contraseña incorrectos. Intenta nuevamente.";
    }
}

$conexion->close();
?>