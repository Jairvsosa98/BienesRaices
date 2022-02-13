<main class="contenedor seccion contenido-centrado justificado">
    <h1 data-cy="titulo-propiedad"><?php echo $propiedad->titulo; ?></h1>

    <picture>
        <img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen de la propiedad">
    </picture>

    <div class="resumen-propiedad">
        <p class="precio">$<?php echo $propiedad->precio; ?></p>
        <ul class="iconos-caracteristicas">
            <li>
                <img loading="lazy" class="icono" src="build/img/icono_wc.svg" alt="Icono wc">
                <p><?php echo $propiedad->wc; ?></p>
            </li>
            <li>
                <img loading="lazy" class="icono" src="build/img/icono_estacionamiento.svg" alt="Icono Estacionamiento">
                <p><?php echo $propiedad->estacionamiento; ?></p>
            </li>
            <li>
                <img loading="lazy" class="icono" src="build/img/icono_dormitorio.svg" alt="Icono Habitaciones">
                <p><?php echo $propiedad->habitaciones; ?></p>
            </li>
        </ul>
        <p> <?php echo $propiedad->descripcion; ?></p>
        
    </div>
    <a data-cy="volver-propiedad" href="/" class="boton boton-verde">Volver</a>
</main>