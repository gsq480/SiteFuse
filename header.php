<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class('bg-slate-50 text-slate-900'); ?>>
<a class="sr-only focus:not-sr-only focus:absolute focus:top-2 focus:left-2 p-2 bg-white rounded" href="#main">Skip to content</a>

<header class="bg-white border-b">
  <div class="container mx-auto px-4 py-4 flex items-center justify-between">
    <a class="text-xl font-extrabold tracking-tight" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    <button id="navToggle" class="md:hidden inline-flex items-center gap-2 px-3 py-2 border rounded" aria-expanded="false" aria-controls="primaryNav">
      <span>Menu</span>
    </button>
    <nav id="primaryNav" class="hidden md:block">
      <?php
        wp_nav_menu([
          'theme_location' => 'primary',
          'menu_class'     => 'md:flex md:items-center md:gap-6',
          'container'      => false,
          'fallback_cb'    => '__return_empty_string',
          'link_before'    => '<span class="hover:underline">',
          'link_after'     => '</span>',
        ]);
      ?>
    </nav>
  </div>
</header>
