<fieldset>
            <legend>Información General</legend>

            <label for="titulo">Titulo:</label>
            <input name="propiedad[titulo]" type="text" id="titulo" placeholder="Titulo Propiedad" value="<?php echo s($propiedad->titulo); ?>">

            <label for="precio">Precio:</label>
            <input maxlength="10" name="propiedad[precio]" type="number" id="precio" placeholder="Precio Propiedad" value="<?php echo s($propiedad->precio); ?>">

            <label for="imagen">Imagen:</label>
            <input name="propiedad[imagen]" type="file" id="imagen" accept="image/jpeg, image/png" >
            <?php if($propiedad->imagen): ?>
                <img class="imagen-small" src="/imagenes/<?php echo $propiedad->imagen ?>">
            <?php endif; ?>

            <label for="descripcion">Descripción:</label>
            <textarea name="propiedad[descripcion]" id="descripcion"><?php echo s($propiedad->descripcion); ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input name="propiedad[habitaciones]" type="number" id="habitaciones" placeholder="Ej: 3" value="<?php echo s($propiedad->habitaciones); ?>" min="1" max="9" step="1">

            <label for="wc">Baños:</label>
            <input name="propiedad[wc]" type="number" id="wc" placeholder="Ej: 3" value="<?php echo s($propiedad->wc); ?>" min="1" max="9" step="1">

            <label for="estacionamiento">Estacionamiento:</label>
            <input name="propiedad[estacionamiento]" type="number" id="estacionamiento" placeholder="Ej: 3" value="<?php echo s($propiedad->estacionamiento); ?>" min="1" max="9" step="1">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <label for="vendedor">Vendedor</label>
            <select name="propiedad[vendedor_id]" id="vendedor">
                <option value="" selected disabled>-- Seleccionar --</option>
                <?php foreach ($vendedores as $vendedor): ?>
                    <option
                        <?php echo $propiedad->vendedor_id === $vendedor->id ? 'selected' : ''; ?> 
                        value="<?php echo s($vendedor->id); ?>">
                        <?php echo s($vendedor->nombre) . " " . s($vendedor->apellidos); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </fieldset>