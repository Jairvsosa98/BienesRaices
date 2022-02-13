<main class="contenedor seccion">
    <h1 data-cy="heading-contacto">Contacto</h1>
    <?php if($mensaje): ?>
                <p data-cy="alerta-envio-formulario" class="alerta exito"><?php echo s($mensaje); ?></p>
    <?php endif; ?>
    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img src="build/img/destacada3.jpg" alt="Imagen Contacto">
    </picture>

    <h2 data-cy="heading-formulario">Llene el Formulario de Contacto</h2>

    <form data-cy="formulario-contacto" class="formulario" action="/contacto" method="POST">
        <fieldset>
            <legend>Información Personal</legend>

            <label for="nombre">Nombre</label>
            <input data-cy="input-nombre" name="contacto[nombre]" id="nombre" type="text" placeholder="Ingrese su nombre">

            <label for="mensaje">Mensaje</label>
            <textarea data-cy="input-mensaje" name="contacto[mensaje]" id="mensaje"></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>
            <label for="opciones">Vende o Compra:</label>
            <select data-cy="input-opciones" name="contacto[tipo]" id="opciones">
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input data-cy="input-presupuesto" name="contacto[presupuesto]" min="1" id="presupuesto" type="number" placeholder="Tu Precio o Presupuesto">
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>
            <p>Como desea ser contactado</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input data-cy="forma-contacto" name="contacto[contacto]" type="radio" value="telefono" id="contactar-telefono">

                <label for="contactar-email">E-mail</label>
                <input data-cy="forma-contacto" name="contacto[contacto]" type="radio" value="email" id="contactar-email">
            </div>

            <div id="contacto"></div>
        </fieldset>

        <input class="boton-verde" type="submit" value="Enviar">
    </form>
</main>