<main class="contenedor seccion">
        <h1>Administrador del Blog Bienes Raices</h1>

        <?php 
            if($mensaje = getMensaje($resultado)) { ?>
                <div class="alerta exito">
                    <?php echo $mensaje; ?>
                </div>
            <?php } 
        ?>
        
        <div class="admin-botones">
            <a href="#blogsIndice" class="boton-amarilloR">Ver Blogs</a>
            <a href="/blogs/crear" class="boton-verde">Nuevo Blog</a>
            <a href="/bloggers/crear" class="boton-amarilloR">Nuevo Blogger</a>
            <a href="#bloggersIndice" class="boton-verde">Ver Bloggers</a>

        </div>
        
        <h2 id="blogsIndice">Blogs</h2>
        <table class="propiedades-tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($entradas as $entrada) { ?>
                    <tr>
                        <td><?php echo $entrada->getId() ?></td>
                        <td><?php echo $entrada->getTitulo() ?></td>
                        <td class="imagen-celda"><img class="imagen-tabla" src="/imagenes/<?php echo $entrada->getImagen() ?>" alt="imagen casa"></td>
                        <td>
                            <a class="boton-amarillo" href="/blogs/actualizar?id=<?php echo $entrada->getId() ?>">Actualizar</a>
                            <form method="POST" action="/blogs/eliminar">
                                <input type="hidden" name="id" value="<?php echo $entrada->getId() ?>">
                                <input type="submit" class="boton-rojo boton-eliminar" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <h2 id="bloggersIndice">Bloggers</h2>
        <table class="propiedades-tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($bloggers as $blogger) { ?>
                    <tr>
                        <td><?php echo $blogger->getId() ?></td>
                        <td><?php echo $blogger->getNombre() . " " . $blogger->getApellido() ?></td>
                        <td><?php echo $blogger->getTelefono() ?></td>
                        <td><?php echo $blogger->getCorreo() ?></td>
                        <td>
                            <a class="boton-amarillo" href="/bloggers/actualizar?id=<?php echo $blogger->getId() ?>">Actualizar</a>
                            <form method="POST" action="/bloggers/eliminar">
                                <input type="hidden" name="id" value="<?php echo $blogger->getId() ?>">
                                <input type="submit" class="boton-rojo boton-eliminar" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
</main>