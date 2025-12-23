<?php get_header(); ?>

<main class="main-content">
    <div class="post-container">
        <article <?php post_class('single-article'); ?>>
            <?php while (have_posts()) : the_post(); ?>
                <header class="post-header">
                    <h1 class="post-title"><?php the_title(); ?></h1>
                    <div class="post-meta">
                        <span class="post-date"><i class="fa-solid fa-calendar"></i> <?php echo get_the_date(); ?></span>
                        <span class="post-author"><i class="fa-solid fa-user"></i> <?php the_author(); ?></span>
                        <span class="post-category"><i class="fa-solid fa-folder"></i> <?php the_category(', '); ?></span>
                    </div>
                    
                    <!-- Etiquetas -->
                    <?php if (has_tag()) : ?>
                        <div class="post-tags">
                            <i class="fa-solid fa-tags"></i> <?php the_tags('', ', ', ''); ?>
                        </div>
                    <?php endif; ?>
                </header>

                <div class="post-content">
                    <?php
                    the_content();
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . __('Páginas:', 'serin'),
                        'after' => '</div>',
                    ));
                    ?>
                </div>

                <?php
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
            <?php endwhile; ?>
        </article>

        <aside class="sidebar">
            <?php get_template_part('parts/aside'); ?>
        </aside>
    </div>
</main>



<div class="posts-list">
    <?php get_template_part('parts/destacado'); ?>
</div>
<div class="posts-list">
    <?php get_template_part('parts/cta'); ?>
</div>

<?php get_footer(); ?>