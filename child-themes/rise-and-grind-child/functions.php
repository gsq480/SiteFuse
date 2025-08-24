<?php
add_action('wp_enqueue_scripts', function () {
    $parent_css = get_template_directory_uri() . '/dist/tailwind.css';
    wp_enqueue_style('sitefuse-parent', $parent_css, [], null);
    
    $child_css_path = get_stylesheet_directory() . '/dist/tailwind.css';
    $child_css_ver = file_exists($child_css_path) ? filemtime($child_css_path) : '1.0.0';
    wp_enqueue_style('sitefuse-child', get_stylesheet_directory_uri() . '/dist/tailwind.css', ['sitefuse-parent'], $child_css_ver);
});

add_action('after_setup_theme', function () {
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    register_nav_menus(['primary' => 'Primary Navigation', 'footer' => 'Footer Navigation']);
});
