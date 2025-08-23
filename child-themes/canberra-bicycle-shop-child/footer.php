<footer class="footer-section mt-20">
  <div class="container py-16">
    <div class="grid md:grid-cols-4 gap-8">
      <div class="md:col-span-2">
        <h3 class="text-xl font-bold mb-4" style="color: var(--color-accent);"><?php bloginfo('name'); ?></h3>
        <p class="text-gray-300 mb-6 max-w-md"><?php bloginfo('description'); ?></p>
      </div>
      <div>
        <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
        <?php wp_nav_menu(['theme_location'=>'footer','menu_class'=>'space-y-2','container'=>false,'fallback_cb'=>'__return_empty_string']); ?>
      </div>
      <div>
        <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
        <div class="space-y-2 text-gray-300">
          <p>📞 (555) 123-4567</p>
          <p>✉️ hello@<?php echo str_replace(' ', '', strtolower(get_bloginfo('name'))); ?>.com</p>
          <p>📍 123 Business St, City, State 12345</p>
        </div>
      </div>
    </div>
  </div>
  <div class="border-t border-gray-700">
    <div class="container py-6">
      <div class="flex flex-col md:flex-row justify-between items-center text-gray-400 text-sm">
        <p>© <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
        <p>Powered by <a href="https://wordpress.org" class="hover:text-white">WordPress</a> and <span style="color: var(--color-accent);">SiteFuse</span></p>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
