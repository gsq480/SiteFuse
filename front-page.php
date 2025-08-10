<?php get_header(); ?>

<section class="relative bg-[#B9FBC0] bg-memphis text-slate-900">
  <div class="mx-auto max-w-7xl px-4 pt-14 pb-12">
    <div class="grid lg:grid-cols-12 gap-10 items-center">
      <div class="lg:col-span-7">
        <p class="font-mono text-xl">Hey there, I'm</p>
        <h1 class="text-5xl sm:text-6xl font-extrabold tracking-tight leading-[1.05]">
          <span class="text-indigo-700">Glen</span> Sinnott
        </h1>
        <p class="mt-4 max-w-2xl text-lg">UX designer from Canberra, focused on human centred services for the Australian Government. Work spans discovery, content and interaction design, and research with accessibility at the core.</p>
        <div class="mt-6 flex flex-wrap gap-3">
          <a href="<?php echo esc_url(home_url('/my-work')); ?>" class="px-5 py-3 rounded-full bg-black text-white border-4 border-slate-900 shadow-retro hover:scale-105 transition">View portfolio</a>
          <a href="<?php echo esc_url(get_permalink( get_option('page_for_posts') )); ?>" class="px-5 py-3 rounded-full bg-white border-4 border-slate-900 hover:bg-yellow-200">Read the blog</a>
        </div>
        <ul class="mt-6 flex flex-wrap gap-2 text-sm">
          <li class="px-3 py-1 rounded-full bg-white border-2 border-slate-900">WCAG 2.1 and 2.2</li>
          <li class="px-3 py-1 rounded-full bg-white border-2 border-slate-900">DTA Service Standard</li>
          <li class="px-3 py-1 rounded-full bg-white border-2 border-slate-900">APS context</li>
        </ul>
      </div>
      <div class="lg:col-span-5">
        <div class="relative max-w-md mx-auto">
          <div class="rounded-2xl overflow-hidden border-4 border-slate-900 neon-card">
            <img src="https://images.unsplash.com/photo-1556157382-97eda2d62296?w=1200&q=80" alt="Sticky note workshop" class="w-full h-72 object-cover">
          </div>
          <div class="absolute -right-6 -top-6 sticker">
            <div class="bg-yellow-300 border-4 border-slate-900 rounded-2xl px-3 py-2 rotate-6 font-mono">⚡ Research</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-12">
  <p class="text-sm text-slate-400 uppercase tracking-wider">Work projects</p>
  <h2 class="text-3xl font-bold mt-2">Creating intuitive user journeys</h2>
  <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php
      $featured = new WP_Query([ 'post_type' => 'work', 'posts_per_page' => 6 ]);
      if ($featured->have_posts()) :
        while ($featured->have_posts()) : $featured->the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="block rounded-2xl bg-white text-slate-900 border-4 border-slate-900 hover-wiggle">
            <?php if (has_post_thumbnail()) { the_post_thumbnail('large', ['class'=>'w-full h-52 object-cover border-b-4 border-slate-900']); } else { ?>
              <img class="w-full h-52 object-cover border-b-4 border-slate-900" src="https://images.unsplash.com/photo-1553877522-43269d4ea984?w=1200&q=80" alt="<?php the_title_attribute(); ?>">
            <?php } ?>
            <div class="p-4">
              <h3 class="font-bold text-lg"><?php the_title(); ?></h3>
              <p class="mt-1 text-sm text-slate-700"><?php echo esc_html(get_the_excerpt()); ?></p>
              <div class="mt-2 flex flex-wrap gap-1 text-xs">
                <?php $terms = get_the_terms(get_the_ID(),'phase'); if ($terms) { foreach ($terms as $t) {
                  echo '<span class="px-2 py-0.5 border-2 border-slate-900 rounded-full bg-yellow-200">'. esc_html($t->name) .'</span>';
                }} ?>
              </div>
            </div>
          </a>
        <?php endwhile; wp_reset_postdata();
      else: ?>
        <p class="text-slate-400">Add Work posts in the dashboard to populate this section.</p>
      <?php endif; ?>
  </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-12">
  <div class="grid lg:grid-cols-3 gap-8 items-start">
    <div class="lg:col-span-2">
      <h2 class="text-3xl font-bold">From the blog</h2>
      <div class="mt-6 grid sm:grid-cols-2 gap-6">
        <?php
        $posts = new WP_Query([ 'post_type' => 'post', 'posts_per_page' => 2 ]);
        if ($posts->have_posts()) :
          while ($posts->have_posts()) : $posts->the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="block rounded-2xl bg-white text-slate-900 border-4 border-slate-900 hover-wiggle">
              <?php if (has_post_thumbnail()) { the_post_thumbnail('large', ['class'=>'w-full h-44 object-cover border-b-4 border-slate-900']); } ?>
              <div class="p-4">
                <h3 class="font-bold text-lg"><?php the_title(); ?></h3>
                <p class="mt-1 text-sm text-slate-700"><?php echo esc_html(get_the_excerpt()); ?></p>
              </div>
            </a>
          <?php endwhile; wp_reset_postdata();
        else: ?>
          <p class="text-slate-400">Create a post to see it here.</p>
        <?php endif; ?>
      </div>
    </div>
    <aside class="bg-white text-slate-900 border-4 border-slate-900 rounded-2xl p-6">
      <h2 class="text-2xl font-extrabold">Skills and tools</h2>
      <ul class="mt-4 space-y-2">
        <li>Usability testing and research ops</li>
        <li>Content design and IA</li>
        <li>Figma, Miro, Jira, Confluence</li>
        <li>Accessibility, WCAG 2.1 and 2.2</li>
        <li>Design systems and pattern libraries</li>
      </ul>
      <a href="<?php echo esc_url(home_url('/contact')); ?>" class="mt-6 inline-block px-4 py-2 rounded-full bg-black text-white border-4 border-slate-900">Work together</a>
    </aside>
  </div>
</section>

<?php get_footer(); ?>