<?php
session_start();

// Verificar si el admin está autenticado
if(isset($_SESSION['id_admin'])){
    // Obtener el ID del admin
    $id_admin = $_SESSION['id_admin'];

    // Obtener los otros datos del formulario
    $titulo = $_POST["titulo"];
    $contenido = $_POST["contenido"];
    $link = $_POST["link"];

    // Conectar a la base de datos
    require_once('../../php/conexion.php');

    // Preparar la consulta para insertar el video
    $consulta = "INSERT INTO contenido_blog (titulo, contenido, link_foto, admin_id_admin) 
    VALUES ('$titulo', '$contenido', '$link', '$id_admin')";

    // Ejecutar la consulta
    if ($conexion->query($consulta) === TRUE) {
        header("location: ../dashboard.php");
    } else {
        echo "Error al insertar el video: " . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
} else {
    echo "No estás autenticado como admin";
}
?>
