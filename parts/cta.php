<?php
// Solo mostrar si está activado

if (is_plugin_active('serincpt/serincpt.php')) {

    if (get_theme_mod('serin_cta_enable', true)) {
        $cta_bg = get_theme_mod('serin_cta_background'); ?>
        <section id="cta" class="cuerpo" <?php echo $cta_bg ? 'style="--cta-bg-image: url(' . esc_url($cta_bg) . ');"' : ''; ?>>
            <div class="inner">
                <header>
                    <h2><?php echo esc_html(get_theme_mod('serin_cta_title', 'Serin Description Page')); ?></h2>
                    <p><?php echo esc_html(get_theme_mod('serin_cta_description', 'Serin Summary Web Page, Description of Website Activity, Serin Summary Web Page, Description of Website Activity.')); ?>
                    </p>
                </header>
                <ul class="actions stacked">
                    <li>
                        <a href="<?php echo esc_url(get_theme_mod('serin_cta_primary_url', '#')); ?>"
                            class="button fit primary">
                            <?php echo esc_html(get_theme_mod('serin_cta_primary_text', 'Activate')); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(get_theme_mod('serin_cta_secondary_url', '#')); ?>" class="button fit">
                            <?php echo esc_html(get_theme_mod('serin_cta_secondary_text', 'Learn More')); ?>
                        </a>
                    </li>
                </ul>
            </div>
        </section>
        <?php
    }
} else {
    echo ('<h1>Activar Plugin SERIN</h1><h3>Custom Post Types</h3>');
}
?>