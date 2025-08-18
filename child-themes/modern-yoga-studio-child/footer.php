<footer style="margin-top: 4rem; background-color: rgb(15 23 42); color: rgb(226 232 240);">
  <div class="container" style="padding: 2.5rem 0; display: grid; gap: 1.5rem;">
    <div><div style="font-size:1.125rem; font-weight:600; margin-bottom:.5rem;">About</div><p style="font-size:.875rem; opacity:.8;">Welcome to <?php bloginfo('name'); ?>.</p></div>
    <div><div style="font-size:1.125rem; font-weight:600; margin-bottom:.5rem;">Contact</div><p style="font-size:.875rem; opacity:.8;">Get in touch with us today.</p></div>
  </div>
  <div style="border-top:1px solid rgb(30 41 59);">
    <div class="container" style="padding:1rem 0; font-size:.875rem; opacity:.7; display:flex; justify-content:space-between;">
      <span>© <?php echo date('Y'); ?> <?php bloginfo('name'); ?></span><span>Powered by WordPress</span>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
