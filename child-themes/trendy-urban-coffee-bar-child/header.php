<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class('font-sans'); ?> style="background-color: var(--color-cream); color: rgb(15 23 42);">
<a class="sr-only focus:not-sr-only focus:absolute focus:top-2 focus:left-2 p-2 bg-white rounded" href="#main">Skip to content</a>
<header style="background-color: rgba(255,255,255,.9); backdrop-filter: blur(12px); border-bottom: 1px solid #e5e7eb;">
  <div class="container" style="padding: 1rem 0; display:flex; align-items:center; justify-content:space-between;">
    <a style="font-size:1.25rem; font-weight:800; letter-spacing:-.025em; color:var(--color-brand); text-decoration:none;" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    <nav class="hidden md:block">
      <?php wp_nav_menu(['theme_location'=>'primary','menu_class'=>'md:flex md:items-center md:gap-6','container'=>false,'fallback_cb'=>'__return_empty_string']); ?>
    </nav>
  </div>
</header>
