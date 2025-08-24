<?php
// Enqueue styles and scripts
add_action('wp_enqueue_scripts', function () {
    // Parent theme styles
    $parent_css = get_template_directory_uri() . '/dist/tailwind.css';
    wp_enqueue_style('sitefuse-parent', $parent_css, [], null);
    
    // Child theme styles
    $child_css_path = get_stylesheet_directory() . '/dist/tailwind.css';
    $child_css_ver = file_exists($child_css_path) ? filemtime($child_css_path) : '1.0.0';
    wp_enqueue_style('sitefuse-child', get_stylesheet_directory_uri() . '/dist/tailwind.css', ['sitefuse-parent'], $child_css_ver);
    
    // Load fonts from website.json
    $website_json = ABSPATH . 'website.json';
    if (file_exists($website_json)) {
        $config = json_decode(file_get_contents($website_json), true);
        if (is_array($config) && isset($config['typography'])) {
            $fonts = [];
            $font_keys = ['headingFont', 'bodyFont', 'accentFont'];
            
            foreach ($font_keys as $key) {
                if (!empty($config['typography'][$key]) && is_string($config['typography'][$key])) {
                    $font_name = trim(explode(',', $config['typography'][$key])[0], '"\'');
                    if ($font_name && $font_name !== 'inherit') {
                        $fonts[str_replace(' ', '+', $font_name)] = true;
                    }
                }
            }
            
            if (!empty($fonts)) {
                $font_families = array_map(function($font) {
                    return $font . ':wght@300;400;500;600;700;800;900';
                }, array_keys($fonts));
                
                $google_fonts_url = 'https://fonts.googleapis.com/css2?family=' . 
                                  implode('&family=', $font_families) . 
                                  '&display=swap';
                
                wp_enqueue_style('sitefuse-fonts', $google_fonts_url, [], null);
            }
        }
    }
    
    // Theme JavaScript
    wp_enqueue_script('sitefuse-theme', get_stylesheet_directory_uri() . '/assets/js/theme.js', [], $child_css_ver, true);
    
    // Add website config to JavaScript
    if (isset($config)) {
        wp_localize_script('sitefuse-theme', 'siteConfig', $config);
    }
});

// Theme setup
add_action('after_setup_theme', function () {
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
    add_theme_support('responsive-embeds');
    add_theme_support('wp-block-styles');
    
    register_nav_menus([
        'primary' => __('Primary Navigation', 'textdomain'),
        'footer' => __('Footer Navigation', 'textdomain')
    ]);
});

// Enhanced navigation attributes
add_filter('nav_menu_link_attributes', function($atts, $item, $args) {
    if (isset($args->theme_location)) {
        switch ($args->theme_location) {
            case 'primary':
                $atts['class'] = trim(($atts['class'] ?? '') . ' nav-link hover:text-brand-primary transition-colors duration-200');
                break;
            case 'footer':
                $atts['class'] = trim(($atts['class'] ?? '') . ' footer-link text-gray-300 hover:text-white transition-colors duration-200');
                break;
        }
    }
    return $atts;
}, 10, 3);

// Add custom body classes for styling
add_filter('body_class', function($classes) {
    $classes[] = 'sitefuse-theme';
    
    if (is_front_page()) {
        $classes[] = 'homepage';
    }
    
    return $classes;
});

// Helper function for theme images with fallbacks
function get_theme_image($image_name, $fallback_url = '') {
    $theme_image = get_stylesheet_directory_uri() . '/assets/img/' . $image_name;
    $theme_path = get_stylesheet_directory() . '/assets/img/' . $image_name;
    
    if (file_exists($theme_path)) {
        return $theme_image;
    }
    
    return $fallback_url ?: 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&h=600&fit=crop';
}
