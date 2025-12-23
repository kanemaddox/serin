<?php
// Obtener items de destacado destacados
if (is_plugin_active('serincpt/serincpt.php')) {
    $destacado_args = array(
        'post_type' => 'destacado',
        'posts_per_page' => -1,
        'meta_key' => '_destacado_order',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => '_destacado_featured',
                'value' => '1',
                'compare' => '='
            ),
            array(
                'key' => '_thumbnail_id',
                'compare' => 'EXISTS'
            )
        )
    );

    $destacado_items = new WP_Query($destacado_args);

    if ($destacado_items->have_posts()) {
        ?>
        <section id="two" class="destacados alt">
            <?php
            $item_count = 0;
            while ($destacado_items->have_posts()):
                $destacado_items->the_post();
                $destacado_url = get_post_meta(get_the_ID(), '_destacado_url', true);
                $button_text = get_post_meta(get_the_ID(), '_destacado_button_text', true) ?: 'Ver Más';
                $item_count++;
                ?>
                <section class="destacado">
                    <div class="image">
                        <?php if (has_post_thumbnail()): ?>
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>"
                                alt="<?php the_title_attribute(); ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="content">
                        <h2><?php the_title(); ?></h2>
                        <div class="destacado-content">
                            <?php the_content(); ?>
                        </div>
                        <?php if ($destacado_url) { ?>
                            <a href="<?php echo esc_url($destacado_url); ?>" class="destacado-button">
                                <?php echo esc_html($button_text); ?>
                            </a>
                        <?php } ?>
                    </div>
                </section>
            <?php endwhile; ?>
        </section>
    <?php
    }
    wp_reset_postdata();

} else {
    echo ('<h1>Activar Plugin SERIN</h1><h3>Custom Post Types</h3>');
}
?>