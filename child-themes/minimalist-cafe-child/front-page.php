<?php get_header(); ?>
<main id="main" class="container" style="padding: 2.5rem 0;">
  <section style="position:relative; overflow:hidden; border-radius:1rem; background:linear-gradient(to right, var(--color-brand), var(--color-accent)); color:white; margin-bottom:3rem;">
    <div style="padding: 4rem 3rem;">
      <div style="display:grid; gap:2rem; align-items:center;">
        <div>
          <h1 class="section-title" style="color:white; margin-bottom:1rem;"><?php bloginfo('description'); ?></h1>
          <p class="lead" style="color:rgba(255,255,255,.9); margin-bottom:2rem;">Welcome to our site. Discover what we have to offer.</p>
          <div style="display:flex; gap:1rem; flex-wrap:wrap;">
            <a href="<?php echo esc_url(home_url('/about')); ?>" class="btn btn-primary">Learn More</a>
            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn" style="border:1px solid rgba(255,255,255,.6); color:white;">Contact Us</a>
          </div>
        </div>
        <div style="border-radius:.75rem; overflow:hidden; box-shadow:0 20px 25px -5px rgba(0,0,0,.1);">
          <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/hero.jpg' ); ?>" alt="Hero" style="width:100%; height:100%; object-fit:cover;">
        </div>
      </div>
    </div>
  </section>
  <section class="card" style="margin-bottom: 2rem;">
    <h2 class="section-title" style="margin-bottom: 1rem;">Welcome</h2>
    <p class="lead">Discover a serene space for coffee lovers.</p>
  </section>
  <section class="card" style="margin-bottom: 2rem;">
    <h2 class="section-title" style="margin-bottom: 1rem;">Our Menu</h2>
    <p class="lead">Enjoy a selection of expertly crafted beverages and pastries.</p>
  </section>
  <section class="card" style="margin-bottom: 2rem;">
    <h2 class="section-title" style="margin-bottom: 1rem;">Visit Us</h2>
    <p class="lead">Join us for a delightful experience in a cozy atmosphere.</p>
  </section>
</main>
<?php get_footer(); ?>
