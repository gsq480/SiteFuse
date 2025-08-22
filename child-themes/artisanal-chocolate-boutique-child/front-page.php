<?php get_header(); ?>
<?php
$website_data = json_decode(file_get_contents(ABSPATH . 'website.json'), true);

// Use AI-generated hero section
$heroSection = $website_data['heroSection'] ?? ['layout' => 'default'];
echo $heroSection['customHTML'] ?? '<section class="hero-section">Default Hero</section>';

// Use AI-generated custom sections
$customSections = $website_data['customSections'] ?? [];
foreach ($customSections as $section) {
  echo $section['html'] ?? '';
}

// Fallback to basic template if no custom sections
if (empty($customSections)) {
  echo '<main>Basic fallback content</main>';
}
?>
<?php get_footer(); ?>
