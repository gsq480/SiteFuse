<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="bg-white shadow-sm sticky top-0 z-40">
        <div class="container flex items-center justify-between h-20">
            <a href="<?php echo home_url(); ?>" class="text-2xl font-bold" style="color: #8B4513;">
                <?php bloginfo('name'); ?>
            </a>
            <nav>
                <?php wp_nav_menu(['theme_location' => 'primary']); ?>
            </nav>
        </div>
    </header>
