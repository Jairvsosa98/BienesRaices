<div class="contenedor-anuncios" >
    <?php foreach ($propiedades as $propiedad):?>
        <div class="anuncio" data-cy="anuncio">
            <picture>
                <img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Anuncio" loading="lazy">
            </picture>
            <div class="contenido-anuncio">
                <h3><?php echo $propiedad->titulo; ?></h3>
                <p><?php echo $propiedad->descripcion; ?></p>
                <p class="precio">S/ <?php echo $propiedad->precio; ?></p>

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
                <a data-cy="enlace-propiedad" class="boton-amarillo-block" href="/propiedad?id=<?php echo $propiedad->id; ?>">Ver Propiedad</a>
            </div> <!-- Contenido-anuncio -->
        </div><!-- Anuncio -->
        <?php endforeach; ?>
    </div><!-- Contenedor-anuncios -->