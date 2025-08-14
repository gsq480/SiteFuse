<?php get_header(); ?>
<main id="main" class="container mx-auto px-4 py-10">
  <?php if (is_front_page()): ?>
    <section class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-indigo-600 via-blue-600 to-cyan-500 text-white">
      <div class="px-6 py-16 md:px-12 md:py-24">
        <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight">Websites that convert</h1>
        <p class="mt-4 text-lg/7 max-w-prose text-white/90">We design and build high quality WordPress sites for local businesses and ambitious brands. Fast, accessible, and easy to manage.</p>
        <div class="mt-8 flex gap-4">
          <a href="<?php echo esc_url(home_url('/contact')); ?>" class="inline-flex items-center justify-center rounded-lg bg-white px-5 py-3 text-slate-900 font-semibold">Start a project</a>
          <a href="<?php echo esc_url(home_url('/work')); ?>" class="inline-flex items-center justify-center rounded-lg ring-1 ring-inset ring-white/40 px-5 py-3 font-semibold">See our work</a>
        </div>
      </div>
    </section>

    <section class="mt-12 grid gap-6 md:grid-cols-3">
      <article class="bg-white rounded-xl shadow p-6">
        <h3 class="font-bold text-lg">Strategy</h3>
        <p class="mt-2 text-sm text-slate-600">Workshops, brand and content planning, site architecture that supports your goals.</p>
      </article>
      <article class="bg-white rounded-xl shadow p-6">
        <h3 class="font-bold text-lg">Design</h3>
        <p class="mt-2 text-sm text-slate-600">Clean, modern interfaces that are accessible and aligned with your brand.</p>
      </article>
      <article class="bg-white rounded-xl shadow p-6">
        <h3 class="font-bold text-lg">Development</h3>
        <p class="mt-2 text-sm text-slate-600">WordPress, WooCommerce and bespoke integrations, performance first.</p>
      </article>
    </section>
  <?php endif; ?>

  <section class="mt-12">
    <?php if (have_posts()): ?>
      <div class="grid gap-6 md:grid-cols-2">
        <?php while (have_posts()): the_post(); ?>
          <article class="bg-white rounded-xl shadow p-6">
            <h2 class="text-2xl font-bold mb-2"><a class="hover:underline" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="prose"><?php the_excerpt(); ?></div>
          </article>
        <?php endwhile; ?>
      </div>
      <div class="mt-8"><?php the_posts_pagination(); ?></div>
    <?php else: ?>
      <p>No content yet.</p>
    <?php endif; ?>
  </section>
</main>
<?php get_footer(); ?>
