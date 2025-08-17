<?php
add_action('wp_enqueue_scripts', function () {
  $parent = get_template_directory_uri() . '/dist/tailwind.css';
  wp_enqueue_style('sitefuse-parent', $parent, [], null);
  $child_path = get_stylesheet_directory() . '/dist/tailwind.css';
  $ver = file_exists($child_path) ? filemtime($child_path) : null;
  wp_enqueue_style('sitefuse-child', get_stylesheet_directory_uri() . '/dist/tailwind.css', ['sitefuse-parent'], $ver);
});
register_nav_menus(['primary' => 'Primary']);
