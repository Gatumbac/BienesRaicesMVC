<fieldset>
<legend>Información General</legend>

<label for="nombre">Nombre</label>
<input 
    type="text" 
    id="nombre" 
    name="nombre" 
    placeholder="Nombre"
    value="<?php echo s( $blogger->getNombre() ); ?>"
>

<label for="apellido">Apellido</label>
<input 
    type="text" 
    id="apellido" 
    name="apellido" 
    placeholder="Apellido"
    value="<?php echo s( $blogger->getApellido() ); ?>"
>
</fieldset>


<fieldset>
<legend>Información Adicional</legend>

<label for="telefono">Teléfono</label>
<input 
    type="tel" 
    id="telefono" 
    name="telefono" 
    placeholder="Telefono"
    value="<?php echo s( $blogger->getTelefono() ); ?>"
>

<label for="email">Email</label>
<input 
    id="email"
    type="email" 
    name="correo" 
    placeholder="Email" 
    value="<?php echo s( $blogger->getCorreo() ); ?>"
>

</fieldset>