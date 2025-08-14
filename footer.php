<footer class="mt-16 bg-slate-900 text-slate-200">
  <div class="container mx-auto px-4 py-10 grid gap-6 md:grid-cols-3">
    <div>
      <div class="text-lg font-semibold">About</div>
      <p class="text-sm opacity-80 mt-2"><?php bloginfo('description'); ?></p>
    </div>
    <div>
      <div class="text-lg font-semibold">Navigation</div>
      <?php
        wp_nav_menu([
          'theme_location' => 'footer',
          'menu_class' => 'space-y-2 mt-2',
          'container'  => false,
          'fallback_cb' => '__return_empty_string',
          'link_before' => '<span class="hover:underline">',
          'link_after'  => '</span>',
        ]);
      ?>
    </div>
    <div>
      <div class="text-lg font-semibold">Contact</div>
      <p class="text-sm opacity-80 mt-2">Email: info@example.com</p>
    </div>
  </div>
  <div class="border-t border-slate-800">
    <div class="container mx-auto px-4 py-4 text-sm opacity-70 flex justify-between">
      <span>© <?php echo date('Y'); ?> <?php bloginfo('name'); ?></span>
      <span>Powered by WordPress</span>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
