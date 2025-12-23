<footer class="footer">
  <div class="footer-container">
    <?php if (is_active_sidebar('footer-1')): ?>
      <?php dynamic_sidebar('footer-1'); ?>
    <?php endif; ?>

    <?php if (is_active_sidebar('footer-2')): ?>
      <?php dynamic_sidebar('footer-2'); ?>
    <?php endif; ?>

    <?php if (is_active_sidebar('footer-3')): ?>
      <?php dynamic_sidebar('footer-3'); ?>
    <?php endif; ?>
  </div>

  <div class="footer-copy">
    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> — Todos los derechos reservados.</p>
  </div>

  <?php wp_footer(); ?>
</footer>
</body>

</html>