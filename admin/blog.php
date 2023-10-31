<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Blog</title>
</head>
<body>
    <!-- Navbar -->
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
                        <a class="nav-link" href="blog.php">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><br>

    <!-- Contenido principal -->
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title text-center">Agregar artículo al blog</h1>
                <form action="php/add_contenido.php" method="POST">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título:</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" name="contenido" id="contenido" style="height: 100px" maxlength="5000" required></textarea>
                        <label for="floatingTextarea2">Contenido</label>
                    </div><br>
                    
                    <div class="mb-3">
                        <label for="link" class="form-label">Link Foto:</label>
                        <input type="text" class="form-control" id="link" name="link" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Agregar artículo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (si necesitas funcionalidades JavaScript de Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</body>
</html>