<main class="contenedor seccion">
        <h1>Actualizar Blogger</h1>
        <a href="/admin-blog" class="boton-verde">Volver</a>

        <?php foreach($errores as $error) { ?>
                <div class="alerta error">
                    <?php echo $error; ?>
                </div>
        <?php } ?>

        <form action="/bloggers/actualizar?id=<?php echo $blogger->getId(); ?>" class="form" method="POST">
            
            <?php include __DIR__ . '/formulario.php' ?>
            
            <input type="submit" value="Guardar Cambios" class="boton-verde">
        </form>

</main>