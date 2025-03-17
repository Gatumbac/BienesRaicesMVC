<fieldset>
<legend>Información General</legend>

<label for="titulo">Titulo</label>
<input 
    type="text" 
    id="titulo" 
    name="titulo" 
    placeholder="Titulo del Blog"
    value="<?php echo s( $blog->getTitulo() ); ?>"
>

<label for="extracto">Extracto</label>
<textarea name="extracto" id="extracto"><?php echo s ($blog->getExtracto()); ?></textarea> 

<label for="contenido">Contenido</label>
<textarea class="contenido-blog" name="contenido" id="contenido"><?php echo s ($blog->getContenido()); ?></textarea> 

<label for="imagen">Imagen</label>
<input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

<?php if ($blog->getImagen()) { ?>
    <img src="/imagenes/<?php echo $blog->getImagen(); ?>" alt="imagen propiedad" class="imagen-small">
<?php } ?>  

</fieldset>

<fieldset>
<legend>Blogger</legend>

<select name="blogger_id" id="vendedores">
    <option value="" selected>--Seleccione un Blogger--</option>
    <?php foreach($bloggers as $blogger) { ?>
        <option <?php echo $blog->getBloggerId() === $blogger->getId() ? 'selected' : ''; ?> value="<?php echo s($blogger->getId()); ?>"><?php echo $blogger->getNombre() . " " . $blogger->getApellido(); ?></option>
    <?php } ?>
</select>

</fieldset>