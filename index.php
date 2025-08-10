<?php get_header(); ?>
<section class="mx-auto max-w-7xl px-4 py-12">
  <h1 class="text-4xl font-extrabold mb-6"><?php is_home() ? _e('Blog', 'nova-uxgov-90s') : wp_title(''); ?></h1>
  <?php if (have_posts()): ?>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php while (have_posts()): the_post(); ?>
        <article class="rounded-2xl bg-white text-slate-900 border-4 border-slate-900 hover-wiggle">
          <a href="<?php the_permalink(); ?>" class="block">
            <?php if (has_post_thumbnail()) { the_post_thumbnail('large', ['class'=>'w-full h-48 object-cover border-b-4 border-slate-900']); } ?>
            <div class="p-5">
              <h2 class="font-bold text-lg"><?php the_title(); ?></h2>
              <p class="mt-1 text-sm text-slate-700"><?php echo esc_html(get_the_excerpt()); ?></p>
            </div>
          </a>
        </article>
      <?php endwhile; ?>
    </div>
    <div class="mt-10 flex items-center justify-between">
      <div><?php previous_posts_link('&larr; Newer'); ?></div>
      <div><?php next_posts_link('Older &rarr;'); ?></div>
    </div>
  <?php else: ?>
    <p class="text-slate-400">No posts found.</p>
  <?php endif; ?>
</section>
<?php get_footer(); ?>