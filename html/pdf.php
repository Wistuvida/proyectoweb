<?php
// Conectar a la base de datos
require_once('../php/conexion.php');

// Obtener el ID de la canción de la URL
$id_video = $_GET['id'];

// Consultar la base de datos para obtener la información de la canción
$consulta = "SELECT * FROM video WHERE id_video = $id_video";
$resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0) {
    $video = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title><?php $video['titulo']; ?></title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    </head>
    <body>
        <header class="icont-menu">
            <div class="container">
                <div class="logo">
                    <h1>
                        <div class="container" style="text-align: center;">
                        
                            <?php echo "<span style='--l: 'C';'>Título: " . $video['titulo'] . "</span><br>";?>
   
                        </div>
                    </h1>
                </div>
            </div>
        </header>
        <div class="container" style="text-align: center;">
            <?php 
                echo "<embed src='".$video['link']."' type='application/pdf' width='100%' height='600px'/>";
            ?>

            <form action="../php/agregar_favorito.php" method="post">
                <input type="hidden" name="id_video" value="<?php echo $video['id_video']; ?>"> 
                
                <input type="submit" class="btn btn-success" id="agregar_favorito" name="agregar_favorito" value="Agregar a Favoritos"> 
            </form>
        </div>
    
        <?php
        } else {
            echo "No se encontró ningun PDF con ese ID.";
        }

        // Cerrar la conexión
        $conexion->close();
        ?>

        <footer class="bg-dark text-light text-center py-3 fixed-bottom">
            <div class="container">
                <p>
                    <a style="color: white;" class="fcc-btn" href="inicio.php">Inicio</a>
                    <a style="color: white;" class="fcc-btn" href="acerca_de.php">Acerca De</a>
                    <a style="color: white;" class="fcc-btn" href="contacto.php">Contacto</a>
                </p>
            </div>
        </footer>
    </body>
</html>