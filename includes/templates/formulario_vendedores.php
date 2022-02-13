<fieldset>
    <legend>Información General</legend>

    <label for="nombre">Nombre:</label>
    <input name="vendedor[nombre]" type="text" id="nombre" placeholder="Nombre Vendedor(a)" value="<?php echo s($vendedor->nombre); ?>">

    <label for="apellidos">Apellidos:</label>
    <input name="vendedor[apellidos]" type="text" id="apellidos" placeholder="Apellidos del Vendedor(a)" value="<?php echo s($vendedor->apellidos); ?>">
</fieldset>

<fieldset>
    <legend>Información Extra</legend>

    <label for="telefono">Teléfono:</label>
    <input maxlength="10" name="vendedor[telefono]" type="number" id="telefono" placeholder="Teléfono del Vendedor(a)" value="<?php echo s($vendedor->telefono); ?>">
</fieldset>