<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=no">
    <?php wp_head(); ?>
</head>

<body <?php body_class('font-sans antialiased'); ?>>
    <?php wp_body_open(); ?>
    
    <a class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 btn btn-primary z-50" href="#main">
        Skip to main content
    </a>
    
    <header class="site-header sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-gray-200 transition-all duration-300">
        <div class="container">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center space-x-3 group">
                        <?php if (has_custom_logo()) : ?>
                            <?php the_custom_logo(); ?>
                        <?php else : ?>
                            <span class="text-2xl font-bold text-brand-primary group-hover:opacity-80 transition-opacity">
                                <?php bloginfo('name'); ?>
                            </span>
                        <?php endif; ?>
                    </a>
                </div>
                
                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center space-x-2" aria-label="Main navigation">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'menu_class' => 'flex items-center space-x-2',
                        'container' => false,
                        'fallback_cb' => '__return_empty_string',
                        'depth' => 2,
                    ]);
                    ?>
                </nav>
                
                <!-- Mobile Menu Button -->
                <button type="button" 
                        class="lg:hidden mobile-menu-btn p-2 rounded-lg text-brand-primary hover:bg-gray-100 transition-colors"
                        aria-label="Toggle mobile menu"
                        aria-expanded="false">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Mobile Menu -->
            <div class="mobile-menu hidden lg:hidden py-4 border-t border-gray-200">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'menu_class' => 'flex flex-col space-y-2',
                    'container' => false,
                    'fallback_cb' => '__return_empty_string',
                ]);
                ?>
            </div>
        </div>
    </header>
