<?php get_header(); ?>
<main class="main-content">
    <div class="post-container">
        <article class="single-article">
            <header class="post-header">
                <h1>Categoria / <?php single_cat_title(); ?></h1>
            </header>
            <?php while (have_posts()):
                the_post(); ?>
                <div class="category-page-posts">
                    <div class="category-page-post">
                        <div class="category-page-image">
                            <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('large'); ?>"
                                    alt="<?php the_title(); ?>"></a>
                        </div>
                        <div class="category-page-content">
                            <div>
                                <h2 class="category-page-title"><a
                                        href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <p class="category-page-excerpt"><?php the_excerpt(); ?></p>
                            </div>
                            <div class="post-meta">
                                <span class="post-date"><i class="fa-solid fa-calendar"></i>
                                    <?php echo get_the_date(); ?></span>
                                <span class="post-author"><i class="fa-solid fa-user"></i> <?php the_author(); ?></span>
                                <span class="post-category"><i class="fa-solid fa-tags"></i>
                                    <?php the_category(', '); ?></span>
                            </div>
                            <h2><a href="<?php the_permalink(); ?>">Leer más</a></h2>
                        </div>
                    </div>
                </div>
                <br><br>
            <?php endwhile; ?>
            <!-- Paginación -->
            <div class="pagination">
                <?php
                echo paginate_links(array(
                    'prev_text' => __('« Anterior', 'serin'),
                    'next_text' => __('Siguiente »', 'serin'),
                ));
                ?>
            </div>
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