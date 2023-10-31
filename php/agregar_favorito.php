<?php
// Conectar a la base de datos
require_once('conexion.php');

session_start(); // Inicia la sesión (asegúrate de haber iniciado sesión antes)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_SESSION['id_usuario']; // Obtén el ID del usuario de la sesión
    $id_video = $_POST["id_video"]; // Obtén el ID del video del formulario
    $id_admin = 1;
    // Preparar la consulta para insertar en la tabla lista_favoritos
    $consulta = "INSERT INTO lista_favoritos (video_id_video,	video_admin_id_admin, usuario_id_usuario) VALUES ($id_video, $id_admin, $id_usuario)";
    // // Ejecutar la consulta
    if ($conexion->query($consulta) === TRUE) {
        echo "Video agregado a favoritos correctamente";
    } else {
        echo "Error al agregar el video a favoritos: " . $conexion->error;
    }
}

// Cerrar la conexión
$conexion->close();
?>