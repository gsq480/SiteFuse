<?php get_header(); ?>
<section class="mx-auto max-w-7xl px-4 py-12">
  <div class="flex items-center justify-between gap-4">
    <h1 class="text-4xl font-extrabold">My work</h1>
    <div>
      <?php
        $terms = get_terms(['taxonomy'=>'phase','hide_empty'=>true]);
        if (! is_wp_error($terms) && $terms) {
          echo '<div class="flex flex-wrap gap-2">';
          foreach ($terms as $t) {
            $url = add_query_arg('phase', $t->slug, get_post_type_archive_link('work'));
            echo '<a class="px-3 py-1 rounded-full bg-white text-slate-900 border-4 border-slate-900" href="'. esc_url($url) .'">'. esc_html($t->name) .'</a>';
          }
          echo '</div>';
        }
      ?>
    </div>
  </div>
  <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php
      $tax_query = [];
      if (! empty($_GET['phase'])) {
        $tax_query[] = [
          'taxonomy' => 'phase',
          'field'    => 'slug',
          'terms'    => sanitize_text_field($_GET['phase'])
        ];
      }
      $q = new WP_Query([ 'post_type' => 'work', 'tax_query' => $tax_query ]);
      if ($q->have_posts()):
        while ($q->have_posts()): $q->the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="block rounded-2xl bg-white text-slate-900 border-4 border-slate-900 hover-wiggle">
            <?php if (has_post_thumbnail()) { the_post_thumbnail('large', ['class'=>'w-full h-52 object-cover border-b-4 border-slate-900']); } ?>
            <div class="p-4">
              <h2 class="font-bold text-lg"><?php the_title(); ?></h2>
              <p class="mt-1 text-sm text-slate-700"><?php echo esc_html(get_the_excerpt()); ?></p>
            </div>
          </a>
        <?php endwhile; wp_reset_postdata();
      else: ?>
        <p class="text-slate-400">No work items yet.</p>
      <?php endif; ?>
  </div>
</section>
<?php get_footer(); ?>