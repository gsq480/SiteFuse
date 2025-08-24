<?php get_header(); ?>

<?php
$config = [];
if (file_exists(ABSPATH . 'website.json')) {
    $config = json_decode(file_get_contents(ABSPATH . 'website.json'), true) ?: [];
}
$hero_html = $config['heroSection']['customHTML'] ?? '';
$hero_image = $config['heroSection']['heroImage'] ?? get_stylesheet_directory_uri() . '/assets/img/hero.jpg';
?>

<main>
    <section class="hero-section relative">
        <img src="<?php echo esc_url($hero_image); ?>" alt="" class="absolute inset-0 w-full h-full object-cover opacity-60" />
        <div class="relative z-10 container text-center text-white py-32">
            <?php if ($hero_html): ?>
                <?php echo wp_kses_post($hero_html); ?>
            <?php else: ?>
                <h1 class="text-6xl font-bold mb-6">Rise & Grind</h1>
                <p class="text-2xl mb-8">Fresh artisanal bread and coffee daily</p>
                <a href="#contact" class="btn btn-primary">Order Online</a>
            <?php endif; ?>
        </div>
    </section>
    
    <?php if (!empty($config['customSections'])): ?>
        <?php foreach ($config['customSections'] as $section): ?>
            <?php if (!empty($section['html'])): ?>
                <?php echo wp_kses_post($section['html']); ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
