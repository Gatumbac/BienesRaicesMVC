    <main class="nosotros">
        <?php include __DIR__ . '/sobre-nosotros.php'; ?>
    </main>

    <section class="contenedor seccion">
        <h2>Casas y Departamentos en Venta</h2>
        <?php
        include __DIR__ . '/anuncios.php'
        ?>
        <div class="anuncios-verMas">
            <a class="boton-verde" href="/propiedades">Ver Todas</a>
        </div>
    </section>

    <div class="contacto seccion">
        <section class="contenedor contacto-contenido">
            <h2>Encuentra la casa de tus sueños</h2>
            <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
            <a class="boton-contacto" href="/contacto">Contáctanos</a>
        </section>
    </div>
    
    <div class="contenedor seccion blog-testimoniales">
        <section class="blog">
            <h3>Nuestro Blog</h3>
            <?php include __DIR__ . '/listado-entradas.php'?>
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonio">
                <div class="testimonio-contenido">
                    <img src="/build/img/logotipos/comilla.svg" alt="comilla">
                    <p>El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.</p>
                </div>
                <p class="autor">- Gabriel Tumbaco</p>    
            </div>
        </section>
</div>