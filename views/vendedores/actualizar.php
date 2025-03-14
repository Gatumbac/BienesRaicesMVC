<main class="contenedor seccion">
        <h1>Actualizar Vendedor</h1>
        <a href="/admin" class="boton-verde">Volver</a>

        <?php foreach($errores as $error) { ?>
                <div class="alerta error">
                    <?php echo $error; ?>
                </div>
        <?php } ?>

        <form action="/vendedores/actualizar?id=<?php echo $vendedor->getId(); ?>" class="form" method="POST">
            
            <?php include __DIR__ . '/formulario.php' ?>
            
            <input type="submit" value="Guardar Cambios" class="boton-verde">
        </form>

</main>