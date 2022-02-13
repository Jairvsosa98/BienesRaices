<main class="contenedor seccion contenido-centrado">
    <h1 data-cy="heading-login">Iniciar Sesión</h1>

    <?php foreach($errores as $error):?>
        <div data-cy="alerta-login" class="alerta error"><?php echo $error; ?></div>
    <?php endforeach ?>

    <form data-cy="formulario-login" class="formulario" method="POST" action="/login" novalidate> 

    <fieldset>
            <legend>Email y Password</legend>

            <label for="email">E-mail</label>
            <input name="email" id="email" type="email" placeholder="Ingrese su email" required>

            <label for="password">Password</label>
            <input name="password" id="password" type="password" placeholder="Ingrese su contraseña" required>
        </fieldset>

        <input class="boton boton-verde" type="submit" value="Iniciar Sesión">

    </form>
</main>