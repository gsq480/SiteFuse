<?php get_header(); ?>
<?php
$website_data = json_decode(file_get_contents(ABSPATH . 'website.json'), true);
$customLayout = $website_data['servicesPageLayout'] ?? '<div class="container py-20"><h1>Our Services</h1></div>';
echo $customLayout;
?>
<?php get_footer(); ?>
