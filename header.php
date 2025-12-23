<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
  <header class="navbar">
    <div class="contactos">
      <div class="contactos-container">
        <div class="contact-info">
          <?php if (get_theme_mod('contact_phone')): ?>
            <div class="contact-item">
              <i class="fas fa-phone"></i>
              <span><?php echo esc_html(get_theme_mod('contact_phone')); ?></span> |
            </div>
          <?php endif; ?>

          <?php if (get_theme_mod('contact_email')): ?>
            <div class="contact-item">
              <i class="fas fa-envelope"></i>
              <span><?php echo esc_html(get_theme_mod('contact_email')); ?></span> |
            </div>
          <?php endif; ?>

          <?php if (get_theme_mod('contact_address')): ?>
            <div class="contact-item">
              <i class="fa-solid fa-location-dot"></i>
              <span><?php echo esc_html(get_theme_mod('contact_address')); ?></span>
            </div>
          <?php endif; ?>
        </div>
        <div class="social-links">
          <?php if (get_theme_mod('social_facebook')): ?>
            |
            <a href="<?php echo esc_url(get_theme_mod('social_facebook')); ?>" target="_blank">
              <i class="fab fa-facebook-f"></i>
            </a>
          <?php endif; ?>

          <?php if (get_theme_mod('social_twitter')): ?>
            |
            <a href="<?php echo esc_url(get_theme_mod('social_twitter')); ?>" target="_blank">
              <i class="fab fa-twitter"></i>
            </a>
          <?php endif; ?>

          <?php if (get_theme_mod('social_instagram')): ?>
            |
            <a href="<?php echo esc_url(get_theme_mod('social_instagram')); ?>" target="_blank">
              <i class="fab fa-instagram"></i>
            </a>
          <?php endif; ?>

          <?php if (get_theme_mod('social_linkedin')): ?>
            |
            <a href="<?php echo esc_url(get_theme_mod('social_linkedin')); ?>" target="_blank">
              <i class="fab fa-linkedin-in"></i>
            </a>
          <?php endif; ?>

          <?php if (get_theme_mod('social_youtube')): ?>
            |
            <a href="<?php echo esc_url(get_theme_mod('social_youtube')); ?>" target="_blank">
              <i class="fab fa-youtube"></i>
            </a>
          <?php endif; ?>
        </div>
      </div>

    </div>

    <div class="nav-container">
      <div class="nav-logo">
        <a href="<?php echo esc_url(home_url()); ?>">
          <?php if (has_custom_logo()) {
            the_custom_logo();
          } else {
            bloginfo('name');
          } ?>
        </a>
        <div class="description">
          <?php bloginfo('description'); ?>
        </div>
      </div>

      <div class="nav-toggle">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
      </div>

      <?php
      wp_nav_menu(array(
        'theme_location' => 'menu_principal',
        'container' => false,
        'menu_class' => 'nav-menu',
        'fallback_cb' => false,
      ));
      ?>
    </div>
  </header>