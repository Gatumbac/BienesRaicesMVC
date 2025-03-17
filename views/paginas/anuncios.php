<div class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedad) { ?>
    <div class="anuncio">
        <img src="<?php echo '/imagenes/' . $propiedad->getImagen(); ?>" alt="imagen propiedad">
        <div class="contenido-anuncio">
            <h3><?php echo $propiedad->getTitulo(); ?></h3>
            <p><?php echo $propiedad->getDescripcion(); ?></p>
            <p class="precio"><?php echo '$ '. $propiedad->getPrecio(); ?></p>
            <ul class="iconos-caracteristicas">
                <li class="icono">
                    <img src="/build/img/logotipos/icono_wc.svg" alt="icono propiedad">
                    <p><?php echo $propiedad->getCantidadWc(); ?></p>
                </li>
                <li class="icono">
                    <img src="/build/img/logotipos/icono_estacionamiento.svg" alt="icono propiedad">
                    <p><?php echo $propiedad->getCantidadParqueos(); ?></p>
                </li>
                <li class="icono">
                    <img src="/build/img/logotipos/icono_dormitorio.svg" alt="icono propiedad">
                    <p><?php echo $propiedad->getCantidadHabitaciones(); ?></p>
                </li>
            </ul>
            <a class="boton" href="/propiedad?id=<?php echo $propiedad->getId(); ?>">Ver Propiedad</a>
        </div>
    </div>
    <?php } ?>
</div>