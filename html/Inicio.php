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
                        <span style="--l: 'I';">I</span>
                        <span style="--l: 'N';">N</span>
                        <span style="--l: 'I';">I</span>
                        <span style="--l: 'C';">C</span>
                        <span style="--l: 'I';">I</span>
                        <span style="--l: 'O';">O</span><br>

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
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Canciones Favoritas</h5>
                        <p class="card-text">No tienes ninguna canción en favoritos. <a href="canciones.php">Explorar canciones</a></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ejercicios de Guitarra</h5>
                        <p class="card-text">No tienes ejercicios guardados. <a href="ejercicios.php">Explorar ejercicios</a></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Material de Aprendizaje</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
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