<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Proyecto</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="../css/style.css">
    <title>menu</title>
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
                        <span style="--l: 'C';">C</span>
                        <span style="--l: 'A';">A</span>
                        <span style="--l: 'N';">N</span>
                        <span style="--l: 'C';">C</span>
                        <span style="--l: 'I';">I</span>
                        <span style="--l: 'O';">O</span>
                        <span style="--l: 'N';">N</span>
                        <span style="--l: 'E';">E</span>
                        <span style="--l: 'S';">S</span><br>

                        <?php
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

    <?php 
        require_once('../php/conexion.php'); 
        $consulta = "SELECT * FROM video WHERE categoria = 'Canción'";
        $resultado = $conexion->query($consulta);

        $consultaEjercicio = "SELECT * FROM video WHERE categoria = 'Ejercicio'";
        $resultadoEjercicio = $conexion->query($consultaEjercicio); 

        $consultaPDF = "SELECT * FROM video WHERE categoria = 'PDF'";
        $resultadoPDF = $conexion->query($consultaPDF);
    ?>

    <div class="container">
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Lista de canciones agregadas por el autor</h5>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">ID cancion</th>
                        <th scope="col">Título</th>
                        <th scope="col">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($fila = $resultado->fetch_assoc()): ?>
                        <tr>
                            <th><?php echo $fila['id_video']; ?></th>
                            <th><?php echo $fila['titulo']; ?></th>
                            <th><?php echo "<a class='button' href='video.php?id=" .$fila['id_video']."'>Ver Canción</a>" ?></th>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
           
    </div>

    <footer class="bg-dark text-light text-center py-3 fixed-bottom">
        <div class="container">
            <p>
                <a style="color: white;" class="fcc-btn" href="inicio.php">Inicio</a>
                <a style="color: white;" class="fcc-btn" href="blog.php">Blog</a>
                <a style="color: white;" class="fcc-btn" href="contacto.php">Contacto</a>
            </p>
        </div>
    </footer>
</body>
</html>