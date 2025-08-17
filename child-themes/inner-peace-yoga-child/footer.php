<footer style="margin-top: 4rem; background-color: rgb(15 23 42); color: rgb(226 232 240);">
  <div class="container" style="padding-top: 2.5rem; padding-bottom: 2.5rem; display: grid; gap: 1.5rem;">
    <div>
      <div style="font-size: 1.125rem; font-weight: 600; margin-bottom: 0.5rem;">About</div>
      <p style="font-size: 0.875rem; opacity: 0.8;">Welcome to <?php bloginfo('name'); ?>. We're here to serve you.</p>
    </div>
    <div>
      <div style="font-size: 1.125rem; font-weight: 600; margin-bottom: 0.5rem;">Contact</div>
      <p style="font-size: 0.875rem; opacity: 0.8;">Get in touch with us today.</p>
    </div>
  </div>
  <div style="border-top: 1px solid rgb(30 41 59);">
    <div class="container" style="padding-top: 1rem; padding-bottom: 1rem; font-size: 0.875rem; opacity: 0.7; display: flex; justify-content: space-between;">
      <span>© <?php echo date('Y'); ?> <?php bloginfo('name'); ?></span>
      <span>Powered by WordPress</span>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
