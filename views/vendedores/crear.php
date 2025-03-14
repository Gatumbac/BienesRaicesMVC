<main class="contenedor seccion">
        <h1>Crear Vendedor/a</h1>
        <a href="/admin" class="boton-verde">Volver</a>

        <?php foreach($errores as $error) { ?>
                <div class="alerta error">
                    <?php echo $error; ?>
                </div>
        <?php } ?>

        <form action="/vendedores/crear" class="form" method="POST">

            <?php include __DIR__ . '/formulario.php' ?>

            <input type="submit" value="Crear Vendedor" class="boton-verde">
        </form>

</main>