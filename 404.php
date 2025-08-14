<?php get_header(); ?>
<main id="main" class="container mx-auto px-4 py-16 text-center">
  <h1 class="text-4xl font-black">404</h1>
  <p class="mt-4">Sorry, that page could not be found.</p>
  <a class="inline-block mt-6 px-5 py-3 rounded-lg bg-slate-900 text-white" href="<?php echo esc_url(home_url('/')); ?>">Back home</a>
</main>
<?php get_footer(); ?>
