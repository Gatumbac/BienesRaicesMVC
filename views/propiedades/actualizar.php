<main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>
        <a href="/admin" class="boton-verde">Volver</a>

        <?php foreach($errores as $error) { ?>
                <div class="alerta error">
                    <?php echo $error; ?>
                </div>
        <?php } ?>

        <form action="/propiedades/actualizar?id=<?php echo $propiedad->getId(); ?>" class="form" method="POST" enctype="multipart/form-data">
            
            <?php include __DIR__ . '/formulario.php' ?>
            
            <input type="submit" value="Actualizar Propiedad" class="boton-verde">
        </form>

</main>