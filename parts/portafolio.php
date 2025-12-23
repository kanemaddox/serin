<?php 

    // Verifica si el plugin está activo
    if ( is_plugin_active( 'serincpt/serincpt.php' ) ) {
        // El plugin está activo, ejecuta el shortcode
        echo do_shortcode('[tarjetas_informativas]');
    } else {
        echo ('<h1>Activar Plugin SERIN</h1><h3>Custom Post Types</h3>');
    }
?>
