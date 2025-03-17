
<?php foreach($blogs as $blog) {  
    $blogger = $bloggers[$blog->getBloggerId()] ?? null;
?>
<article class="blog-entrada">
    <img src="<?php echo '/imagenes/' . $blog->getImagen()?>" alt="imagen blog">
    <div class="entrada-contenido">
        <a href="/entrada?id=<?php echo $blog->getId()?>">
            <h4><?php echo $blog->getTitulo(); ?></h4>
        </a>
        <p class="informacion-meta">Escrito el: <span><?php echo $blog->getFechaPublicacion() ?></span> por: <span><?php echo $blogger ? $blogger->getNombreCompleto() : 'Autor Desconocido'; ?></span></p>
        <p><?php echo $blog->getExtracto() ?></p>
    </div>
</article>
<?php } ?>