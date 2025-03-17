    <main class="contenedor seccion anuncio-contenido">
        <h1><?php echo $propiedad->getTitulo(); ?></h1>
        <img src="<?php echo '/imagenes/' . $propiedad->getImagen(); ?>" alt="imagen propiedad">
        <div class="resumen-propiedad">
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
        </div>
        <p><?php echo $propiedad->getDescripcion(); ?></p>
    </main>