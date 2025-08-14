<?php get_header(); ?>
<main id="main" class="container mx-auto px-4 py-10">
  <article class="bg-white rounded-xl shadow p-6">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
      <h1 class="text-3xl font-bold mb-4"><?php the_title(); ?></h1>
      <div class="prose"><?php the_content(); ?></div>
    <?php endwhile; endif; ?>
  </article>
</main>
<?php get_footer(); ?>
