<main class="contenedor entrada-pagina seccion">
    <h1><?php echo $blog->getTitulo(); ?></h1>
    <img src="<?php echo '/imagenes/' . $blog->getImagen();?>" alt="Imagen Blog">
    <p class="informacion-meta">Escrito el: <span><?php echo $blog->getFechaPublicacion(); ?></span> por: <span><?php echo $blogger->getNombreCompleto();; ?></span></p>
    <p><?php echo $blog->getContenido(); ?></p>
</main>