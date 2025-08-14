<?php
if (!defined('ABSPATH')) { exit; }

add_action('after_setup_theme', function () {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', ['search-form','comment-form','comment-list','gallery','caption','style','script']);
  register_nav_menus([
    'primary' => __('Primary Menu', 'sitefuse-agency'),
    'footer'  => __('Footer Menu', 'sitefuse-agency'),
  ]);
});

add_action('wp_enqueue_scripts', function () {
  $css_path = get_template_directory() . '/dist/tailwind.css';
  $css_uri  = get_template_directory_uri() . '/dist/tailwind.css';
  $ver = file_exists($css_path) ? filemtime($css_path) : null;
  wp_enqueue_style('sitefuse-tailwind', $css_uri, [], $ver);
  wp_enqueue_script('sitefuse-theme', get_template_directory_uri() . '/assets/js/theme.js', [], '1.0.0', true);
});
