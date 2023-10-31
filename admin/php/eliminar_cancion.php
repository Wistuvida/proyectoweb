<?php
// Conectar a la base de datos
require_once('../../php/conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_video = $_POST["id_video"];

    // Preparar la consulta de eliminación
    $consulta = "DELETE FROM video WHERE id_video = $id_video";

    // Ejecutar la consulta
    if ($conexion->query($consulta) === TRUE) {
        header("location: ../dashboard.php");
    } else {
        echo "Error al eliminar el contenido: " . $conexion->error;
    }
}

// Cerrar la conexión
$conexion->close();
?>