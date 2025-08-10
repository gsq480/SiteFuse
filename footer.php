<?php ?>
  </main>
  <footer class="mt-16 border-t-4 border-slate-900 bg-memphis text-slate-900">
    <div class="mx-auto max-w-7xl px-4 py-10 text-sm flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
      <p>&copy; <span data-year></span> Glen Sinnott, Canberra ACT. Built with WordPress and Tailwind.</p>
      <nav aria-label="Footer">
        <?php wp_nav_menu([ 'theme_location' => 'footer', 'menu_class' => 'flex items-center gap-3', 'container' => false ]); ?>
      </nav>
    </div>
  </footer>
  <?php wp_footer(); ?>
</body>
</html>