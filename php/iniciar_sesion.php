<?php
require_once('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];
    $contrasena = md5($_POST["contrasena"]);

    $consulta = "SELECT * FROM usuario WHERE correo='$correo' AND contrasena='$contrasena'";

    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows == 1) {
        $fila = $resultado->fetch_assoc(); // Obtener la fila de la consulta
        $nombre_usuario = $fila['nombre']; // Obtener el nombre del usuario
        $id_usuario = $fila['id_usuario'];

        session_start();
        $_SESSION['correo'] = $correo;
        $_SESSION['nombre'] = $nombre_usuario; // Guardar el nombre en la sesión
        $_SESSION['id_usuario'] = $id_usuario;
        header("Location: ../html/Inicio.php");
        exit();
    } else {
        echo "Correo o contraseña incorrectos. Intenta nuevamente.";
    }
}

$conexion->close();
?>