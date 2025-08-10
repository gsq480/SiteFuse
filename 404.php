<?php get_header(); ?>
<section class="mx-auto max-w-3xl px-4 py-20 text-center">
  <h1 class="text-7xl font-black">404</h1>
  <p class="mt-2 text-slate-400">That page was not found.</p>
  <a href="<?php echo esc_url(home_url('/')); ?>" class="mt-6 inline-block px-5 py-3 rounded-full bg-black text-white border-4 border-slate-900">Go home</a>
</section>
<?php get_footer(); ?>