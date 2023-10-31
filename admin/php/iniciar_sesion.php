<?php
require_once('../../php/conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    $consulta = "SELECT * FROM admin WHERE correo='$correo' AND contrasena='$contrasena'";

    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows == 1) {
        $fila = $resultado->fetch_assoc(); // Obtener la fila de la consulta
        $nombre_usuario = $fila['nombre']; // Obtener el nombre del usuario
        $id_admin = $fila['id_admin'];
        session_start();
        $_SESSION['correo'] = $correo;
        $_SESSION['nombre'] = $nombre_usuario; // Guardar el nombre en la sesión
        $_SESSION['id_admin'] = $id_admin;
        header("Location: ../dashboard.php");
        exit();
    } else {
        header("Location: ../index.php");
    }
}

$conexion->close();
?>