<?php

function recursos()
{
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/all.min.css', array(), '6.4.0');
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'recursos');

// Registrar un menú principal
function serin_menu()
{
    register_nav_menus(array(
        'menu_principal' => __('Menú principal', 'serin')
    ));
}
add_action('init', 'serin_menu');

function serin_scripts()
{
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'serin_scripts');

// Widgets del footer
function widgets_footer()
{
    register_sidebar(array(
        'name' => 'Pie de página 1',
        'id' => 'footer-1',
        'description' => 'Primer bloque del pie de página',
        'before_widget' => '<div class="footer-block">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => 'Pie de página 2',
        'id' => 'footer-2',
        'description' => 'Segundo bloque del pie de página',
        'before_widget' => '<div class="footer-block">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => 'Pie de página 3',
        'id' => 'footer-3',
        'description' => 'Tercer bloque del pie de página',
        'before_widget' => '<div class="footer-block">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'widgets_footer');

// Widgets del sidebar
function serin_register_sidebars()
{
    register_sidebar(array(
        'name' => 'sidebar-1',
        'id' => 'sidebar-1',
        'description' => 'Widgets para posts individuales',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => 'sidebar-2',
        'id' => 'sidebar-2',
        'description' => 'Widgets para páginas estáticas',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => 'sidebar-3',
        'id' => 'sidebar-3',
        'description' => 'Widgets para páginas estáticas',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'serin_register_sidebars');

// Personalizador de WordPress para la barra de contacto
function serin_customize_register($wp_customize)
{
    // Sección para información de contacto
    $wp_customize->add_section('contact_info_section', array(
        'title' => __('Información de Contacto', 'serin'),
        'priority' => 30,
    ));

    // Teléfono
    $wp_customize->add_setting('contact_phone', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_phone', array(
        'label' => __('Teléfono', 'serin'),
        'section' => 'contact_info_section',
        'type' => 'text',
    ));

    // Email
    $wp_customize->add_setting('contact_email', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('contact_email', array(
        'label' => __('Email', 'serin'),
        'section' => 'contact_info_section',
        'type' => 'email',
    ));

    // Dirección
    $wp_customize->add_setting('contact_address', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_address', array(
        'label' => __('Dirección', 'serin'),
        'section' => 'contact_info_section',
        'type' => 'text',
    ));

    // Sección para redes sociales
    $wp_customize->add_section('social_links_section', array(
        'title' => __('Redes Sociales', 'serin'),
        'priority' => 31,
    ));

    // Facebook
    $wp_customize->add_setting('social_facebook', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_facebook', array(
        'label' => __('Facebook URL', 'serin'),
        'section' => 'social_links_section',
        'type' => 'url',
    ));

    // Twitter
    $wp_customize->add_setting('social_twitter', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_twitter', array(
        'label' => __('Twitter URL', 'serin'),
        'section' => 'social_links_section',
        'type' => 'url',
    ));

    // Instagram
    $wp_customize->add_setting('social_instagram', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_instagram', array(
        'label' => __('Instagram URL', 'serin'),
        'section' => 'social_links_section',
        'type' => 'url',
    ));

    // LinkedIn
    $wp_customize->add_setting('social_linkedin', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_linkedin', array(
        'label' => __('LinkedIn URL', 'serin'),
        'section' => 'social_links_section',
        'type' => 'url',
    ));

    // youtube
    $wp_customize->add_setting('social_youtube', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_youtube', array(
        'label' => __('Youtube URL', 'serin'),
        'section' => 'social_links_section',
        'type' => 'url',
    ));
}
add_action('customize_register', 'serin_customize_register');

add_theme_support('post-thumbnails');

add_image_size('serin-thumbnails', 400, 300, true);

// plugin serin
include_once(ABSPATH . 'wp-admin/includes/plugin.php');

add_action('admin_notices', function () {
    if (!is_plugin_active('serincpt/serincpt.php')) {
        echo '<div class="notice notice-error"><p><strong>El plugin "SERIN Custom Post Types"</strong> no está activo. Algunos contenidos personalizados no se mostrarán correctamente.</p></div>';
    }
});

// Agregar controles para la sección CTA al Customizer
function serin_customize($wp_customize)
{

    // Sección para CTA
    $wp_customize->add_section('serin_cta_section', array(
        'title' => __('Sección CTA', 'serin'),
        'priority' => 30,
    ));

    // Mostrar/ocultar sección CTA
    $wp_customize->add_setting('serin_cta_enable', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('serin_cta_enable', array(
        'label' => __('Mostrar sección CTA', 'serin'),
        'section' => 'serin_cta_section',
        'type' => 'checkbox',
    ));

    // Título del CTA
    $wp_customize->add_setting('serin_cta_title', array(
        'default' => 'Arcue ut vel commodo',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serin_cta_title', array(
        'label' => __('Título del CTA', 'serin'),
        'section' => 'serin_cta_section',
        'type' => 'text',
    ));

    // Descripción del CTA
    $wp_customize->add_setting('serin_cta_description', array(
        'default' => 'Aliquam ut ex ut augue consectetur interdum endrerit imperdiet amet eleifend fringilla.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serin_cta_description', array(
        'label' => __('Descripción', 'serin'),
        'section' => 'serin_cta_section',
        'type' => 'textarea',
    ));

    // Imagen de fondo
    $wp_customize->add_setting('serin_cta_background', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'serin_cta_background', array(
        'label' => __('Imagen de Fondo', 'serin'),
        'section' => 'serin_cta_section',
        'description' => __('Recomendado: 1920x1080px para mejor calidad', 'serin'),
    )));

    // Color del overlay
    $wp_customize->add_setting('serin_cta_overlay_color', array(
        'default' => 'rgba(0, 123, 255, 0.8)',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'serin_cta_overlay_color', array(
        'label' => __('Color del Overlay', 'serin'),
        'section' => 'serin_cta_section',
    )));

    // Botón Primario - Texto
    $wp_customize->add_setting('serin_cta_primary_text', array(
        'default' => 'Activate',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serin_cta_primary_text', array(
        'label' => __('Texto Botón Primario', 'serin'),
        'section' => 'serin_cta_section',
        'type' => 'text',
    ));

    // Botón Primario - URL
    $wp_customize->add_setting('serin_cta_primary_url', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('serin_cta_primary_url', array(
        'label' => __('URL Botón Primario', 'serin'),
        'section' => 'serin_cta_section',
        'type' => 'url',
    ));

    // Botón Secundario - Texto
    $wp_customize->add_setting('serin_cta_secondary_text', array(
        'default' => 'Learn More',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serin_cta_secondary_text', array(
        'label' => __('Texto Botón Secundario', 'serin'),
        'section' => 'serin_cta_section',
        'type' => 'text',
    ));

    // Botón Secundario - URL
    $wp_customize->add_setting('serin_cta_secondary_url', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('serin_cta_secondary_url', array(
        'label' => __('URL Botón Secundario', 'serin'),
        'section' => 'serin_cta_section',
        'type' => 'url',
    ));

    // Color del texto
    $wp_customize->add_setting('serin_cta_text_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'serin_cta_text_color', array(
        'label' => __('Color del Texto', 'serin'),
        'section' => 'serin_cta_section',
    )));
}
add_action('customize_register', 'serin_customize');

// CSS dinámico para el Customizer
function serin_cta_customizer_css()
{
    ?>
    <style type="text/css">
        .wrapper.style4 {
            --cta-text-color:
                <?php echo esc_html(get_theme_mod('serin_cta_text_color', '#ffffff')); ?>
            ;
            --cta-overlay-color:
                <?php echo esc_html(get_theme_mod('serin_cta_overlay_color', 'rgba(0, 123, 255, 0.8)')); ?>
            ;
        }

        <?php if (get_theme_mod('serin_cta_background')): ?>
            .wrapper.style4::before {
                background-image: url('<?php echo esc_url(get_theme_mod('serin_cta_background')); ?>');
            }

        <?php endif; ?>
    </style>
    <?php
}
add_action('wp_head', 'serin_cta_customizer_css');

// Crear un menú principal en wordpress admin personalizado
function agregar_menu_principal_personalizado()
{
    if ( function_exists('is_plugin_active') ) {
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    }
    if (is_plugin_active('serincpt/serincpt.php')) {
        add_menu_page(
            'Serin', // Título de la página
            'Serin', // Título del menú
            'manage_options', // Capacidad requerida
            'Serin', // Slug del menú
            '', // Función callback (vacía)
            'dashicons-media-code', // Icono
            30 // Posición en el menú
        );
    }
}
add_action('admin_menu', 'agregar_menu_principal_personalizado');

function serin_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('automatic-feed-links');

    add_theme_support('post-thumbnails');

    // Soporte de estilos de bloques de WP
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');

    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));
    // Soporte de Custom Header
    add_theme_support('custom-header', array(
        'default-image' => get_template_directory_uri() . '/assets/images/header.jpg', // ruta por defecto
        'width' => 1920,
        'height' => 400,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => false, // true si quieres mostrar título sobre la imagen
    ));
    // Soporte de fondo personalizado
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff', // color por defecto
        'default-image' => '',        // ruta por defecto si quieres una imagen
    ));

    add_editor_style(get_template_directory_uri() . '/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'serin_theme_setup');


require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action('tgmpa_register', function () {
    $plugins = [
        [
            'name' => 'SERIN Custom Post Types',
            'slug' => 'serincpt',
            'source' => get_template_directory_uri() . '/plugins/serincpt.zip',
            'required' => true,
        ],
    ];

    $config = [
        'id' => 'serin',
        'menu' => 'tgmpa-install-plugins',
        'has_notices' => true,
        'dismissable' => false,
        'is_automatic' => true, // activa el plugin automáticamente después de instalarlo
    ];

    tgmpa($plugins, $config);
});

// Registrar estilos personalizados para bloques
function serin_register_block_styles()
{

    // Ejemplo: Estilo para párrafos
    register_block_style('core/paragraph', array(
        'name' => 'highlight',
        'label' => __('Resaltado', 'serin'),
    ));

    // Ejemplo: Estilo para botones
    register_block_style('core/button', array(
        'name' => 'outline',
        'label' => __('Botón con borde', 'serin'),
    ));

    // Ejemplo: Estilo para imágenes
    register_block_style('core/image', array(
        'name' => 'shadow',
        'label' => __('Sombra', 'serin'),
    ));
}
add_action('init', 'serin_register_block_styles');


function serin_register_block_patterns()
{

    if (function_exists('register_block_pattern')) {

        register_block_pattern(
            'serin/cta-pattern',
            array(
                'title' => __('Sección CTA Moderna', 'serin'),
                'description' => _x('Un bloque de CTA con fondo y botones', 'Block pattern description', 'serin'),
                'categories' => array('cta', 'featured'),
                'content' => '<!-- wp:group {"className":"cta-pattern"} -->
<div class="wp-block-group cta-pattern" style="background-color:#0073aa;color:#fff;padding:2rem;">
<!-- wp:heading {"level":2} -->
<h2>¡Únete a nuestra comunidad!</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Descubre los beneficios y novedades que tenemos para ti.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button {"backgroundColor":"white","textColor":"primary"} -->
<div class="wp-block-button"><a class="wp-block-button__link" href="#">Registrarse</a></div>
<!-- /wp:button -->
<!-- wp:button {"backgroundColor":"secondary","textColor":"white"} -->
<div class="wp-block-button"><a class="wp-block-button__link" href="#">Más Información</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->'
            )
        );

    }
}
add_action('init', 'serin_register_block_patterns');


// Activar el script de respuestas anidadas en comentarios
function serin_enqueue_comment_reply()
{
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'serin_enqueue_comment_reply');
