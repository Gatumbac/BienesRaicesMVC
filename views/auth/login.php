<main class="contenedor iniciar-sesion seccion">
    <h1>Iniciar Sesión</h1>

    <?php foreach($errores as $error) { ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
    <?php } ?>

    <form method="POST" class="form" action="/login">
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">Email</label>
            <input id="email" type="email" name="email" placeholder="Tu Email" required>

            <label for="password">Password</label>
            <input id="password" type="password" name="password" placeholder="Tu Contraseña" required>

        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton-verde">
    </form>
</main>