<?php get_header(); ?>

<?php get_template_part('parts/slide'); ?>
<main class="main-content">
  <div class="container">

    <div class="posts-list">
      <?php get_template_part('parts/portafolio'); ?>
    </div>

    <div class="posts-list">
      <?php get_template_part('parts/articulo'); ?>
    </div>

    <div class="posts-list">
      <?php get_template_part('parts/cta'); ?>
    </div>

    <div class="posts-list">
      <hr><br><br>
    </div>

    <div class="posts-list">
      <?php get_template_part('parts/destacado'); ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>