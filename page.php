<?php get_header(); ?>

<main class="main-content">
    <div class="post-container">
        <article class="page-article">
            <?php while (have_posts()):
                the_post(); ?>
                <header class="post-header">
                    <h1 class="post-title"><?php the_title(); ?></h1>
                </header>

                <?php if (has_post_thumbnail()): ?>
                    <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>"
                        class="post-featured-image">
                <?php endif; ?>

                <div class="post-content">
                    <?php the_content(); ?>
                </div>

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