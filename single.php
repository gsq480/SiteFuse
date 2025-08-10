<?php get_header(); ?>
<article class="mx-auto max-w-3xl px-4 py-12 prose prose-invert">
  <h1 class="text-4xl font-extrabold tracking-tight"><?php the_title(); ?></h1>
  <p class="text-slate-400 mt-2 text-sm"><?php echo get_the_date(); ?></p>
  <?php if (has_post_thumbnail()) { the_post_thumbnail('large', ['class'=>'rounded-xl border-4 border-slate-900 my-6']); } ?>
  <div class="prose prose-invert">
    <?php while (have_posts()): the_post(); the_content(); endwhile; ?>
  </div>
</article>
<?php get_footer(); ?>