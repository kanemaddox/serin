<?php
// Obtener slides activos
if (is_plugin_active('serincpt/serincpt.php')) {
    $slides_args = array(
        'post_type' => 'slide',
        'posts_per_page' => -1,
        'meta_key' => '_slide_order',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => '_thumbnail_id',
                'compare' => 'EXISTS'
            )
        )
    );
    $slides = new WP_Query($slides_args);

    if ($slides->have_posts()) { ?>
        <div class="slideshow-container">
            <?php
            $slide_count = 0;
            while ($slides->have_posts()):
                $slides->the_post();
                $slide_url = get_post_meta(get_the_ID(), '_slide_url', true);
                $button_text = get_post_meta(get_the_ID(), '_slide_button_text', true) ?: 'Ver Más';
                $active_class = $slide_count === 0 ? 'active' : '';
                ?>
                <div class="slide <?php echo $active_class; ?>"
                    style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');">
                    <div class="slide-content">
                        <h1><?php the_title(); ?></h1>
                        <div class="slide-description">
                            <?php the_content(); ?>
                        </div>
                        <?php if ($slide_url) { ?>
                            <a href="<?php echo esc_url($slide_url); ?>" class="read-more-btn">
                                <?php echo esc_html($button_text); ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <?php
                $slide_count++;
            endwhile;
            wp_reset_postdata();
            ?>

            <div class="slideshow-nav">
                <span class="prev">&#10094;</span>
                <span class="next">&#10095;</span>
            </div>
        </div>
    <?php }

} else {
    echo ('<h1>Activar Plugin SERIN</h1><h3>Custom Post Types</h3>');
}
?>