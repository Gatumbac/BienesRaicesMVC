<main class="contenedor seccion">
        <h1>Administrador de Bienes Raíces</h1>

        <?php 
            if($mensaje = getMensaje($resultado)) { ?>
                <div class="alerta exito">
                    <?php echo $mensaje; ?>
                </div>
            <?php } 
        ?>
        
        <div class="admin-botones">
            <a href="#propiedadesIndice" class="boton-amarilloR">Ver Propiedades</a>
            <a href="/propiedades/crear" class="boton-verde">Nueva Propiedad</a>
            <a href="/vendedores/crear" class="boton-amarilloR">Nuevo Vendedor</a>
            <a href="#vendedoresIndice" class="boton-verde">Ver Vendedores</a>
            <a href="/admin-blog" class="boton-azulR">Administrar Blog</a>

        </div>
        
        <h2 id="propiedadesIndice">Propiedades</h2>
        <table class="propiedades-tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($propiedades as $propiedad) { ?>
                    <tr>
                        <td><?php echo $propiedad->getId() ?></td>
                        <td><?php echo $propiedad->getTitulo() ?></td>
                        <td class="imagen-celda"><img class="imagen-tabla" src="/imagenes/<?php echo $propiedad->getImagen() ?>" alt="imagen casa"></td>
                        <td>$ <?php echo $propiedad->getPrecio() ?></td>
                        <td>
                            <a class="boton-amarillo" href="/propiedades/actualizar?id=<?php echo $propiedad->getId() ?>">Actualizar</a>
                            <form method="POST" action="/propiedades/eliminar">
                                <input type="hidden" name="id" value="<?php echo $propiedad->getId() ?>">
                                <input type="submit" class="boton-rojo boton-eliminar" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <h2 id="vendedoresIndice">Vendedores</h2>
        <table class="propiedades-tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($vendedores as $vendedor) { ?>
                    <tr>
                        <td><?php echo $vendedor->getId() ?></td>
                        <td><?php echo $vendedor->getNombre() . " " . $vendedor->getApellido() ?></td>
                        <td><?php echo $vendedor->getTelefono() ?></td>
                        <td>
                            <a class="boton-amarillo" href="/vendedores/actualizar?id=<?php echo $vendedor->getId() ?>">Actualizar</a>
                            <form method="POST" action="/vendedores/eliminar">
                                <input type="hidden" name="id" value="<?php echo $vendedor->getId() ?>">
                                <input type="submit" class="boton-rojo boton-eliminar" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
</main>