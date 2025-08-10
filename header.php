<?php ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php wp_head(); ?>
  <style>
    .bg-memphis {
      background-image:
        radial-gradient(#0ea5e91a 2px, transparent 2px),
        radial-gradient(#f472b61a 2px, transparent 2px);
      background-position: 0 0, 7px 7px;
      background-size: 14px 14px;
    }
  </style>
</head>
<body <?php body_class('bg-[#FAF9F6] text-slate-900'); ?>>
  <a class="sr-only focus:not-sr-only focus:absolute focus:p-2 focus:bg-slate-900" href="#content">Skip to content</a>

  <header class="sticky top-0 z-50 border-b-4 border-slate-900 bg-gradient-to-b from-mint/60 to-transparent backdrop-blur">
    <div class="mx-auto max-w-7xl px-3 sm:px-4 py-3">
      <div class="nav-pill px-4 py-2 bg-white text-slate-900 flex items-center justify-between gap-4">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3 hover-wiggle">
          <div class="h-8 w-8 rounded-full bg-gradient-to-br from-indigo-400 to-cyan-300 grid place-items-center font-black">GS</div>
          <span class="font-extrabold">Glen Sinnott</span>
        </a>
        <nav aria-label="Primary">
          <?php
            wp_nav_menu([
              'theme_location' => 'primary',
              'menu_class'     => 'flex items-center gap-2',
              'container'      => false,
              'fallback_cb'    => function () {
                echo '<ul class="flex items-center gap-2">';
                echo '<li><a class="px-3 py-1 nav-link bg-white hover:bg-yellow-200" href="'. esc_url(home_url('/my-work')) .'">My Work</a></li>';
                echo '<li><a class="px-3 py-1 nav-link bg-white hover:bg-yellow-200" href="'. esc_url(get_permalink( get_option('page_for_posts') )) .'">Blog</a></li>';
                echo '<li><a class="px-3 py-1 nav-link bg-white hover:bg-yellow-200" href="'. esc_url(home_url('/contact')) .'">Contact</a></li>';
                echo '</ul>';
              }
            ]);
          ?>
        </nav>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="px-4 py-1 rounded-full bg-black text-white border-2 border-slate-900 hover:scale-105 transition">Get in touch</a>
      </div>
    </div>
  </header>

  <main id="content">