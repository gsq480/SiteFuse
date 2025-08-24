<footer class="site-footer bg-gray-900 text-gray-300 mt-20">
    <div class="container py-16">
        <div class="grid md:grid-cols-4 gap-8 mb-8">
            <!-- Company Info -->
            <div class="md:col-span-2">
                <h3 class="text-2xl font-bold mb-4 text-brand-accent">
                    <?php bloginfo('name'); ?>
                </h3>
                <p class="text-gray-400 mb-6 max-w-md leading-relaxed">
                    <?php 
                    $description = get_bloginfo('description');
                    echo !empty($description) ? esc_html($description) : 'Creating exceptional experiences for our valued customers.';
                    ?>
                </p>
                <div class="flex space-x-4">
                    <!-- Social media links can be added here -->
                </div>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-semibold mb-4 text-white">Quick Links</h4>
                <nav aria-label="Footer navigation">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'footer',
                        'menu_class' => 'space-y-2',
                        'container' => false,
                        'fallback_cb' => function() {
                            echo '<ul class="space-y-2">';
                            echo '<li><a href="' . esc_url(home_url('/about')) . '" class="footer-link">About</a></li>';
                            echo '<li><a href="' . esc_url(home_url('/services')) . '" class="footer-link">Services</a></li>';
                            echo '<li><a href="' . esc_url(home_url('/contact')) . '" class="footer-link">Contact</a></li>';
                            echo '</ul>';
                        },
                    ]);
                    ?>
                </nav>
            </div>
            
            <!-- Contact Info -->
            <div>
                <h4 class="text-lg font-semibold mb-4 text-white">Contact Info</h4>
                <div class="space-y-3 text-gray-400">
                    <p class="flex items-center">
                        <span class="mr-2">📞</span>
                        <a href="tel:+15551234567" class="footer-link">(555) 123-4567</a>
                    </p>
                    <p class="flex items-center">
                        <span class="mr-2">✉️</span>
                        <a href="mailto:hello@<?php echo sanitize_title(get_bloginfo('name')); ?>.com" class="footer-link">
                            hello@<?php echo sanitize_title(get_bloginfo('name')); ?>.com
                        </a>
                    </p>
                    <p class="flex items-start">
                        <span class="mr-2 mt-1">📍</span>
                        <span>123 Business Street<br>Your City, State 12345</span>
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Footer Bottom -->
        <div class="border-t border-gray-800 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
                <p>
                    © <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
                </p>
                <p class="mt-4 md:mt-0">
                    Powered by 
                    <a href="https://wordpress.org" class="hover:text-white transition-colors" rel="nofollow">WordPress</a>
                    and 
                    <span class="text-brand-accent font-medium">SiteFuse</span>
                </p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
