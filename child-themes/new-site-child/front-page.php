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

// Helper function to safely output HTML sections
function render_ai_section($html, $wrapper_class = '', $index = 0) {
    if (empty($html) || !is_string($html)) return;
    
    // Add alternating background colors
    $bg_class = ($index % 2 === 0) ? 'bg-white' : 'bg-gray-50';
    if (!empty($wrapper_class)) {
        $bg_class = $wrapper_class;
    }
    
    // Check if HTML already has proper container structure
    if (strpos($html, 'container') !== false || strpos($html, '<section') === 0) {
        echo $html;
    } else {
        // Wrap in section with container
        echo "<section class='py-16 {$bg_class}'><div class='container mx-auto px-4'>{$html}</div></section>";
    }
}

// Get hero configuration
$hero_html = $config['heroSection']['customHTML'] ?? '';
$hero_image = $config['heroSection']['heroImage'] ?? get_theme_image('hero.jpg');
$site_name = get_bloginfo('name');
$site_tagline = get_bloginfo('description');
?>

<main id="main" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section relative">
        <div class="absolute inset-0">
            <img src="<?php echo esc_url($hero_image); ?>" 
                 alt="<?php echo esc_attr($site_name); ?>" 
                 class="w-full h-full object-cover" 
                 loading="eager" />
        </div>
        
        <div class="relative z-10 container text-center text-white py-24 md:py-32 lg:py-40">
            <?php if (!empty($hero_html)) : ?>
                <?php echo wp_kses_post($hero_html); ?>
            <?php else : ?>
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 animate-fade-in">
                    <?php echo esc_html($site_name); ?>
                </h1>
                <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto animate-fade-in">
                    <?php echo esc_html($site_tagline); ?>
                </p>
                <a href="#contact" class="btn btn-primary text-lg animate-fade-in">
                    Get Started Today
                </a>
            <?php endif; ?>
        </div>
    </section>
    
    <?php
    // Render custom sections from AI
    if (!empty($config['customSections']) && is_array($config['customSections'])) {
        foreach ($config['customSections'] as $index => $section) {
            if (isset($section['html']) && is_string($section['html']) && !empty($section['html'])) {
                render_ai_section($section['html'], '', $index);
            }
        }
    }
    
    // Fallback homepage layout if no custom sections
    if (empty($config['customSections']) && !empty($config['homepageLayout'])) {
        render_ai_section($config['homepageLayout']);
    }
    ?>
</main>

<?php get_footer(); ?>
