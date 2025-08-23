<?php
add_action('wp_enqueue_scripts', function () {
  $parent = get_template_directory_uri() . '/dist/tailwind.css';
  wp_enqueue_style('sitefuse-parent', $parent, [], null);

  $child_path = get_stylesheet_directory() . '/dist/tailwind.css';
  $ver = file_exists($child_path) ? filemtime($child_path) : null;
  wp_enqueue_style('sitefuse-child', get_stylesheet_directory_uri() . '/dist/tailwind.css', ['sitefuse-parent'], $ver);

  $website_json = ABSPATH . 'website.json';
  if (file_exists($website_json)) {
    $cfg = json_decode(file_get_contents($website_json), true);
    if (is_array($cfg) && isset($cfg['typography'])) {
      $families = [];
      foreach (['headingFont','bodyFont','accentFont'] as $k) {
        if (!empty($cfg['typography'][$k]) && is_string($cfg['typography'][$k])) {
          $fam = trim(explode(',', $cfg['typography'][$k])[0]);
          if ($fam !== '') $families[$fam] = true;
        }
      }
      if ($families) {
        $qs = implode('&family=', array_map(function($f){ return str_replace(' ','+',$f).':wght@400;600;700;800'; }, array_keys($families)));
        wp_enqueue_style('sitefuse-fonts', 'https://fonts.googleapis.com/css2?family='.$qs.'&display=swap', [], null);
      }
    }
  }

  wp_enqueue_script('sitefuse-js', get_stylesheet_directory_uri() . '/assets/js/theme.js', [], $ver, true);
});

add_action('after_setup_theme', function () {
  add_theme_support('post-thumbnails');
  add_theme_support('custom-logo');
  add_theme_support('title-tag');
  add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
  register_nav_menus(['primary' => 'Primary Navigation', 'footer' => 'Footer Navigation']);
});

add_filter('nav_menu_link_attributes', function($atts, $item, $args){
  if (isset($args->theme_location) && in_array($args->theme_location, ['primary','footer'], true)) {
    $atts['class'] = trim(($atts['class'] ?? '') . ' nav-link');
  }
  return $atts;
}, 10, 3);
