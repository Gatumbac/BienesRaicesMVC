<main class="contenedor seccion">
        <h1>Crear Blogger/a</h1>
        <a href="/admin-blog" class="boton-verde">Volver</a>

        <?php foreach($errores as $error) { ?>
                <div class="alerta error">
                    <?php echo $error; ?>
                </div>
        <?php } ?>

        <form action="/bloggers/crear" class="form" method="POST">

            <?php include __DIR__ . '/formulario.php' ?>

            <input type="submit" value="Crear Blogger" class="boton-verde">
        </form>

</main>