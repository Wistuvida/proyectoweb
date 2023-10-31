<?php
session_start();

// Verificar si el admin está autenticado
if(isset($_SESSION['id_admin'])){
    // Obtener el ID del admin
    $id_admin = $_SESSION['id_admin'];

    // Obtener los otros datos del formulario
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $link = $_POST["link"];
    $categoria = $_POST["seleccionar_categoria"];
    $valoracion = 0;

    // Conectar a la base de datos
    require_once('../../php/conexion.php');

    // Preparar la consulta para insertar el video
    $consulta = "INSERT INTO video (titulo, descripcion, link, categoria, valoracion, admin_id_admin) 
    VALUES ('$titulo', '$descripcion', '$link', '$categoria', $valoracion, '$id_admin')";

    // Ejecutar la consulta
    if ($conexion->query($consulta) === TRUE) {
        echo "Video insertado correctamente";
    } else {
        echo "Error al insertar el video: " . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
} else {
    echo "No estás autenticado como admin";
}
?>
