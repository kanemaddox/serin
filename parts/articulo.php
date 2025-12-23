<?php if (have_posts()): ?>

    <div class="page-header">
        <h1 class="page-title">Últimas Entradas</h1>
    </div>
    <div class="posts-grid">
        <?php
        $recent_posts = new WP_Query(array(
            'posts_per_page' => 3,
            'post_status' => 'publish',
            'ignore_sticky_posts' => true
        ));

        while ($recent_posts->have_posts()):
            $recent_posts->the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('front-card'); ?>
                style="background-image: url('<?php the_post_thumbnail_url('large'); ?>');">
                <div class="front-content">
                    <div class="front-resumen">
                        <h2 class="front-title"><?php the_title(); ?></h2>
                        <p class="front-excerpt"><?php echo get_the_excerpt(); ?></p>
                        <div class="front-meta">
                            <span class="front-category"><i class="fa-solid fa-calendar"></i>
                                <?php echo get_the_date(); ?></span> ·
                            <span class="front-category"><i class="fa-solid fa-user"></i> <?php the_author(); ?></span> ·
                            <span class="front-category"><i class="fa-solid fa-tags"></i> <?php the_category(', '); ?></span>
                        </div>
                        <p class="front-excerpt"></p>
                        <a href="<?php the_permalink(); ?>" class="read-more-btn">Leer más</a>
                    </div>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
    

    <?php wp_reset_postdata(); ?>
<?php else: ?>
    <p>No hay posts</p>
<?php endif; ?>