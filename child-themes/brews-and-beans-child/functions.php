<?php
// Enqueue styles and scripts
add_action('wp_enqueue_scripts', function () {
  $parent = get_template_directory_uri() . '/dist/tailwind.css';
  wp_enqueue_style('sitefuse-parent', $parent, [], null);

  $child_path = get_stylesheet_directory() . '/dist/tailwind.css';
  $ver = file_exists($child_path) ? filemtime($child_path) : null;
  wp_enqueue_style('sitefuse-child', get_stylesheet_directory_uri() . '/dist/tailwind.css', ['sitefuse-parent'], $ver);

  wp_enqueue_script('sitefuse-js', get_stylesheet_directory_uri() . '/assets/js/theme.js', [], $ver, true);
});

// Setup theme supports and menus
add_action('after_setup_theme', function () {
  add_theme_support('post-thumbnails');
  add_theme_support('custom-logo');
  add_theme_support('title-tag');
  add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
  register_nav_menus([
    'primary' => 'Primary Navigation',
    'footer'  => 'Footer Navigation'
  ]);
});

// Add a link class to menu items cleanly
add_filter('nav_menu_link_attributes', function($atts, $item, $args){
  if (isset($args->theme_location) && in_array($args->theme_location, ['primary','footer'], true)) {
    $atts['class'] = trim(($atts['class'] ?? '') . ' nav-link');
  }
  return $atts;
}, 10, 3);

// Custom post types
add_action('init', function() {
  register_post_type('testimonial', [
    'labels' => ['name' => 'Testimonials', 'singular_name' => 'Testimonial'],
    'public' => true,
    'supports' => ['title', 'editor', 'thumbnail'],
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-format-quote',
    'rewrite' => ['slug' => 'testimonials'],
  ]);

  register_post_type('service', [
    'labels' => ['name' => 'Services', 'singular_name' => 'Service'],
    'public' => true,
    'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-admin-tools',
    'rewrite' => ['slug' => 'services'],
  ]);

  register_post_type('portfolio', [
    'labels' => ['name' => 'Portfolio', 'singular_name' => 'Portfolio Item'],
    'public' => true,
    'supports' => ['title', 'editor', 'thumbnail'],
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-portfolio',
    'rewrite' => ['slug' => 'portfolio'],
  ]);
});

// Simple options helper
function get_business_info($field) {
  $info = get_option('business_info', []);
  return $info[$field] ?? '';
}

// Contact form shortcode
add_shortcode('contact_form', function() {
  ob_start(); ?>
  <form class="contact-form space-y-4" action="#" method="post">
    <div class="grid md:grid-cols-2 gap-4">
      <input type="text" name="name" placeholder="Your Name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand">
      <input type="email" name="email" placeholder="Your Email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand">
    </div>
    <input type="text" name="subject" placeholder="Subject" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand">
    <textarea name="message" rows="5" placeholder="Your Message" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand"></textarea>
    <button type="submit" class="btn btn-primary w-full">Send Message</button>
  </form>
  <?php
  return ob_get_clean();
});
