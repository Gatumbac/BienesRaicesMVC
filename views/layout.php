<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;
    $inicio = false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header <?php echo $inicio ? 'inicio': ''; ?> ">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="<?php echo $auth ? '/admin' : '/index.php' ?>">
                    <img src="/build/img/logotipos/logo.svg" alt="Logotipo">
                </a>
                <div class="mobile-menu">
                    <img src="/build/img/logotipos/barras.svg" alt="barras menu">
                </div>

                <div class="nav-dark-mode">
                    <img class="icon-dark-mode" src="/build/img/logotipos/dark-mode.svg" alt="dark mode">
                    <nav class="navegacion">
                        <a class="navegacion__enlace" href="/nosotros.php">Nosotros</a>
                        <a class="navegacion__enlace" href="/anuncios.php">Anuncios</a>
                        <a class="navegacion__enlace" href="/blog.php">Blog</a>
                        <a class="navegacion__enlace" href="/contacto.php">Contacto</a>
                        <?php if($auth) { ?>
                            <a href="/cerrar-sesion.php">Cerrar Sesión</a>
                        <?php } ?>
                    </nav>
                </div>
            </div>
            <?php if ( $inicio ) { ?>
                    <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
            <?php } ?>
        </div>
    </header>
    
    <?php echo $contenido ?>

    <footer class="footer">
        <div class="contenedor  contenido-footer">
            <nav class="navegacion mostrar">
                <a class="navegacion__enlace" href="/nosotros.php">Nosotros</a>
                <a class="navegacion__enlace" href="/anuncios.php">Anuncios</a>
                <a class="navegacion__enlace" href="/blog.php">Blog</a>
                <a class="navegacion__enlace" href="/contacto.php">Contacto</a>
            </nav>
            <p>Todos los derechos reservados <?php echo date('Y'); ?> &copy</p>
        </div>
    </footer>

    <script src="/build/js/app.js"></script>

</body>

</html>