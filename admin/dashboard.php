<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Dashboard Admin</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard.php">Bienvenido Admin, <?php session_start();
                            if(isset($_SESSION['correo'])){
                                echo $_SESSION['nombre'];
                            } else {
                                header("Location: formulario_login.php");
                                exit();
                            }?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cancion.php">Agregar Tutorial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ejercicio.php">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><br>


    <?php 
        require_once('../php/conexion.php'); 
        $consulta = "SELECT * FROM video WHERE categoria = 'Canción'";
        $resultado = $conexion->query($consulta);

        $consultaEjercicio = "SELECT * FROM video WHERE categoria = 'Ejercicio'";
        $resultadoEjercicio = $conexion->query($consultaEjercicio); 

        $consultaPDF = "SELECT * FROM video WHERE categoria = 'PDF'";
        $resultadoPDF = $conexion->query($consultaPDF);
    ?>
    <!-- Contenido principal -->
    <div class="container">
       
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Canciones que añadiste</h5>
                <table class="table">
                    
                    <thead>
                        <tr>
                        <th scope="col">ID cancion</th>
                        <th scope="col">Título</th>
                        <th scope="col">Categoría</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($fila = $resultado->fetch_assoc()): ?>
                        <tr>
                            <th><?php echo $fila['id_video']; ?></th>
                            <th><?php echo $fila['titulo']; ?></th>
                            <th><?php echo $fila['categoria']; ?></th>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="cancion.php">Agregar más canciones</a>
            </div>
        </div><br>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ejercicios que añadiste</h5>
                <table class="table">
                    
                    <thead>
                        <tr>
                        <th scope="col">ID cancion</th>
                        <th scope="col">Título</th>
                        <th scope="col">Categoría</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($fila = $resultadoEjercicio->fetch_assoc()): ?>
                        <tr>
                            <th><?php echo $fila['id_video']; ?></th>
                            <th><?php echo $fila['titulo']; ?></th>
                            <th><?php echo $fila['categoria']; ?></th>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="cancion.php">Agregar más ejercicios</a>
            </div>
        </div><br>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">PDF's que añadiste</h5>
                <table class="table">
                    
                    <thead>
                        <tr>
                        <th scope="col">ID cancion</th>
                        <th scope="col">Título</th>
                        <th scope="col">Categoría</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($fila = $resultadoPDF->fetch_assoc()): ?>
                        <tr>
                            <th><?php echo $fila['id_video']; ?></th>
                            <th><?php echo $fila['titulo']; ?></th>
                            <th><?php echo $fila['categoria']; ?></th>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="cancion.php">Agregar más PDF's</a>
            </div>
        </div>
            
    </div>

    <!-- Bootstrap JS (si necesitas funcionalidades JavaScript de Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</body>
</html>