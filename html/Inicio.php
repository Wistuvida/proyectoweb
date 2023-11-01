<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Inicio</title>
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
                        &nbsp
                        &nbsp
                        &nbsp
                        <br>
                        <span style="--l: 'I';">I</span>
                        <span style="--l: 'N';">N</span>
                        <span style="--l: 'I';">I</span>
                        <span style="--l: 'C';">C</span>
                        <span style="--l: 'I';">I</span>
                        <span style="--l: 'O';">O</span><br>
                        <?php
                        require_once("../php/conexion.php");
                        session_start();
                        if(isset($_SESSION['correo'])){
                            echo "<span style='color: white;'>Hola, " . $_SESSION['nombre'] . "</span>";
                        } else {
                            header("Location: ../index.php");
                            exit();
                        }
                        ?>
                    </div>
                </h1> 
            </div>
        </div>
        
    </header>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Canciones Favoritas</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">ID cancion</th>
                                <th scope="col">Título</th>
                                <th scope="col">Ver</th>
                                </tr>
                            </thead>
                            <?php
                                
                                $id_usuario = $_SESSION['id_usuario'];
                                $consulta = "SELECT * FROM lista_favoritos WHERE usuario_id_usuario = $id_usuario";

                                $resultado = $conexion->query($consulta);

                                if ($resultado->num_rows > 0) {
                                    while($lista_favoritos = $resultado->fetch_assoc()) {
                                        $id_video = $lista_favoritos['video_id_video'];
                                        $consultaVideo = "SELECT * FROM video WHERE id_video = $id_video  AND categoria = 'Cancion'";
                                        $resultadoVideo = $conexion->query($consultaVideo);
                                        
                                    ?>
                                    
                                        <tbody>
                                            <?php while($fila = $resultadoVideo->fetch_assoc()): ?>
                                                <tr>
                                                    <th><?php echo $fila['id_video']; ?></th>
                                                    <th><?php echo $fila['titulo']; ?></th>
                                                    <th><?php echo "<a class='button' href='video.php?id=" .$fila['id_video']."'>Ver Canción</a>" ?></th>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    

                                    <?php
                                    }
                                } else {
                                    echo "No hay canciones agregadas";
                                }                              
                            ?>
                        </table>
                    </div>
                    <div class="card-footer">
                        
                        <a href="canciones.php">Ver más canciones</a>
                    </div>
                </div>
                
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ejercicios de Guitarra</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">ID cancion</th>
                                <th scope="col">Título</th>
                                <th scope="col">Ver</th>
                                </tr>
                            </thead>
                            <?php
                                
                                $consultaEjercicio = "SELECT * FROM lista_favoritos WHERE usuario_id_usuario = $id_usuario";

                                $resultadoEjercicio = $conexion->query($consultaEjercicio);

                                if ($resultadoEjercicio->num_rows > 0) {
                                    while($lista_favoritos = $resultadoEjercicio->fetch_assoc()) {
                                        $id_video = $lista_favoritos['video_id_video'];
                                        $consultaEjer = "SELECT * FROM video WHERE id_video = $id_video  AND categoria = 'Ejercicio'";
                                        $resultadoEjer = $conexion->query($consultaEjer);
                                        
                                    ?>
                                    
                                        <tbody id="tablaEjercicios">
                                            <?php while($fila = $resultadoEjer->fetch_assoc()): ?>
                                                <tr>
                                                    <th><?php echo $fila['id_video']; ?></th>
                                                    <th><?php echo $fila['titulo']; ?></th>
                                                    <th><?php echo "<a class='button' href='video.php?id=" .$fila['id_video']."'>Ver Canción</a>" ?></th>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    

                                    <?php
                                    }
                                } else {
                                    echo("<script>
                                        document.getElementById('tablaEjercicios').innerHTML = <tr><th>No hay ejercicios agregados<th></tr>
                                    </script>");
                                }
                            ?>
                        </table>
                    </div>
                    <div class="card-footer">
                        
                        <a href="ejercicios.php">Ver más ejercicios</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Material de Aprendizaje</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">ID PDF</th>
                                <th scope="col">Título</th>
                                <th scope="col">Ver</th>
                                </tr>
                            </thead>
                            <?php
                                
                                $consultaDoc = "SELECT * FROM lista_favoritos WHERE usuario_id_usuario = $id_usuario";

                                $resultadoDoc = $conexion->query($consultaDoc);

                                if ($resultadoDoc->num_rows > 0) {
                                    while($lista_favoritos = $resultadoDoc->fetch_assoc()) {
                                        $id_video = $lista_favoritos['video_id_video'];
                                        $consultaPDF = "SELECT * FROM video WHERE id_video = $id_video  AND categoria = 'PDF'";
                                        $resultadoPDF = $conexion->query($consultaPDF);
                                        
                                    ?>
                                    
                                        <tbody id="tablaEjercicios">
                                            <?php while($fila = $resultadoPDF->fetch_assoc()): ?>
                                                <tr>
                                                    <th><?php echo $fila['id_video']; ?></th>
                                                    <th><?php echo $fila['titulo']; ?></th>
                                                    <th><?php echo "<a class='button' href='video.php?id=" .$fila['id_video']."'>Ver Canción</a>" ?></th>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    

                                    <?php
                                    }
                                } else {
                                    echo("<script>
                                        document.getElementById('tablaEjercicios').innerHTML = <tr><th>No hay ejercicios agregados<th></tr>
                                    </script>");
                                }
                            ?>
                        </table>
                    </div>
                    <div class="card-footer">
                        
                        <a href="ver_pdf.php">Ver más PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

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