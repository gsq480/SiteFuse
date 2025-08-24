<?php
get_header();

// Load website configuration
$config = [];
$config_path = ABSPATH . 'website.json';
if (file_exists($config_path)) {
    $json_content = file_get_contents($config_path);
    $decoded = json_decode($json_content, true);
    if (is_array($decoded)) {
        $config = $decoded;
    }
}
?>

<main id="main" class="site-main">
    <!-- Page Header -->
    <section class="py-16 bg-gradient-brand text-white">
        <div class="container text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">
                <?php the_title(); ?>
            </h1>
            <p class="text-xl max-w-3xl mx-auto">
                Discover our comprehensive range of services designed to meet your needs.
            </p>
        </div>
    </section>
    
    <!-- Services Content -->
    <section class="py-16">
        <div class="container">
            <?php if (!empty($config['servicesPageLayout'])) : ?>
                <?php echo wp_kses_post($config['servicesPageLayout']); ?>
            <?php else : ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="prose prose-lg max-w-none">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; endif; ?>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
