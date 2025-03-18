<main class="contenedor seccion contacto-pagina">
    <h1>Contacto</h1>
    <?php 
        if($mensaje) { ?>
            <div class="alerta exito">
                <?php echo $mensaje; ?>
            </div>
        <?php } 
    ?>
    <picture>
        <source srcset="/build/img/propiedades/destacada3.webp" type="image/webp">
        <img src="/build/img/propiedades/destacada3.jpg" alt="imagen terraza">
    </picture>
    <h2>Llene el formulario de contacto</h2>
    <form action="/contacto" method="POST" class="form">
        <fieldset>
            <legend>Información Personal</legend>

            <label for="nombre">Nombre</label>
            <input id="nombre" name="nombre" type="text" placeholder="Tu nombre" required>

            <label for="mensaje">Mensaje</label>
            <textarea name="mensaje" id="mensaje" placeholder="Escribe un mensaje" required></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <label for="opciones">Vende o compra</label>
            <select name="tipo" id="opciones" required>
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="compra">Compra</option>
                <option value="vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input id="presupuesto" name="precio" type="number" placeholder="Tu precio o presupuesto" min="1000" required>

        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <p>¿Cómo desea ser contactado?</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input name="contacto" type="radio" value="telefono" id="contactar-telefono" required>

                <label for="contactar-email">Email</label>
                <input name="contacto" type="radio" value="email" id="contactar-email" required>
            </div>

            <div id="contacto"></div>

        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>

