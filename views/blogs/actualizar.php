<main class="contenedor seccion">
        <h1>Actualizar Blog</h1>
        <a href="/admin-blog" class="boton-verde">Volver</a>

        <?php foreach($errores as $error) { ?>
                <div class="alerta error">
                    <?php echo $error; ?>
                </div>
        <?php } ?>

        <form action="/blogs/actualizar?id=<?php echo $blog->getId(); ?>" class="form" method="POST" enctype="multipart/form-data">

            <?php include __DIR__ . '/formulario.php' ?>

            <input type="submit" value="Guardar Cambios" class="boton-verde">
        </form>

</main>