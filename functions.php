<?php
if ( ! defined( 'NOVA_UXGOV_90S_VERSION' ) ) {
  define( 'NOVA_UXGOV_90S_VERSION', '1.1.0' );
}

add_action('after_setup_theme', function () {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', ['search-form','gallery','caption','style','script']);
  register_nav_menus([
    'primary' => __('Primary Menu', 'nova-uxgov-90s'),
    'footer'  => __('Footer Menu', 'nova-uxgov-90s')
  ]);
});

add_action('wp_enqueue_scripts', function () {
  // Tailwind CDN
  wp_enqueue_script('tailwindcdn','https://cdn.tailwindcss.com',[],null,false);

  $tw = "
  tailwind.config = {
    theme: {
      extend: {
        fontFamily: {
          sans: ['Inter','ui-sans-serif','system-ui','Segoe UI','Roboto','Noto Sans','Helvetica Neue','Arial'],
          mono: ['VT323','ui-monospace','SFMono-Regular','Menlo','Monaco','Consolas']
        },
        colors: {
          mint: '#b9fbc0',
          lilac: '#c4b5fd',
          neon: { DEFAULT: '#22d3ee', pink: '#f472b6', yellow: '#fde047' }
        },
        boxShadow: {
          retro: '0 0 0 4px #0f172a, 0 10px 0 #0f172a, 0 18px 30px rgba(0,0,0,.25)'
        }
      }
    }
  }";
  wp_add_inline_script('tailwindcdn', $tw, 'after');

  // retro font from Google
  wp_enqueue_style('vt323','https://fonts.googleapis.com/css2?family=VT323&display=swap',[],null);
  wp_enqueue_style('inter','https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap',[],null);

  wp_enqueue_script('nova-uxgov-90s', get_template_directory_uri() . '/theme.js', [], NOVA_UXGOV_90S_VERSION, true);
  wp_enqueue_style('nova-uxgov-90s-style', get_stylesheet_uri(), [], NOVA_UXGOV_90S_VERSION);
});

// Work CPT and Phase taxonomy
add_action('init', function () {
  register_post_type('work', [
    'labels' => [
      'name' => __('Work', 'nova-uxgov-90s'),
      'singular_name' => __('Work Item', 'nova-uxgov-90s'),
      'menu_name' => __('My Work', 'nova-uxgov-90s')
    ],
    'public' => true,
    'menu_icon' => 'dashicons-portfolio',
    'supports' => ['title','editor','thumbnail','excerpt','revisions'],
    'has_archive' => true,
    'rewrite' => ['slug' => 'work'],
    'show_in_rest' => true
  ]);

  register_taxonomy('phase', ['work'], [
    'labels' => [
      'name' => __('Phase', 'nova-uxgov-90s'),
      'singular_name' => __('Phase', 'nova-uxgov-90s'),
    ],
    'public' => true,
    'hierarchical' => false,
    'show_in_rest' => true
  ]);
});

// Seed pages and personalised sample content
add_action('after_switch_theme', function () {
  $pages = [
    'Home' => 'home',
    'Blog' => 'blog',
    'My Work' => 'my-work',
    'Contact' => 'contact'
  ];
  $ids = [];
  foreach ($pages as $title => $slug) {
    $page = get_page_by_path($slug);
    if (!$page) {
      $ids[$title] = wp_insert_post([
        'post_title' => $title,
        'post_name'  => $slug,
        'post_status'=> 'publish',
        'post_type'  => 'page',
      ]);
    } else { $ids[$title] = $page->ID; }
  }
  if (! empty($ids['Home'])) { update_option('show_on_front','page'); update_option('page_on_front', $ids['Home']); }
  if (! empty($ids['Blog'])) { update_option('page_for_posts', $ids['Blog']); }

  // Seed Work items with resume-based content
  $samples = [
    [
      'title' => 'myGov mobile app',
      'name'  => 'mygov-mobile-app',
      'excerpt' => 'Senior UX for iOS and Android at national scale, research, testing, and design system stewardship.',
      'content' => '<p>Designed for accessibility and scale, across iOS and Android. Ran user research and testing, delivered prototypes, and contributed to a living design system.</p>',
      'terms' => ['Beta','Live']
    ],
    [
      'title' => 'Apprenticeships Data Management System (ADMS)',
      'name'  => 'apprenticeships-data-management-system',
      'excerpt' => 'Lead designer for ADMS, lifting satisfaction and consolidating patterns.',
      'content' => '<p>Led UX for ADMS and ESS, created IA and service blueprints, and introduced reusable patterns that improved user satisfaction.</p>',
      'terms' => ['Alpha','Beta']
    ],
    [
      'title' => 'Health Products portal, ODC and HPRG',
      'name'  => 'health-products-portal-odc-hprg',
      'excerpt' => 'UX for complex licence workflows, research, IA updates, and pattern library.',
      'content' => '<p>Improved licence variation flows, validated accessibility, and built a reusable Figma-based design system to streamline delivery.</p>',
      'terms' => ['Discovery','Alpha']
    ],
  ];
  foreach ($samples as $s) {
    if (! get_page_by_path($s['name'], OBJECT, 'work')) {
      $id = wp_insert_post([
        'post_title' => $s['title'],
        'post_name'  => $s['name'],
        'post_type'  => 'work',
        'post_status'=> 'publish',
        'post_excerpt'=> $s['excerpt'],
        'post_content'=> $s['content']
      ]);
      if ($id && ! is_wp_error($id)) {
        wp_set_object_terms($id, $s['terms'], 'phase');
      }
    }
  }

  // First blog post
  if (! get_page_by_path('why-government-ux', OBJECT, 'post')) {
    wp_insert_post([
      'post_title'   => 'Why government UX matters',
      'post_name'    => 'why-government-ux',
      'post_status'  => 'publish',
      'post_type'    => 'post',
      'post_excerpt' => 'Human-centred design for public services that people trust.',
      'post_content' => '<p>Notes on discovery, content, accessibility, and delivery inside the APS context, with lessons from large services.</p>'
    ]);
  }
});