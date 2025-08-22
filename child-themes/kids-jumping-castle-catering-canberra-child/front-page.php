<?php get_header(); ?>
<?php
$website_data = json_decode(file_get_contents(ABSPATH . 'website.json'), true);

// Use AI-generated complete homepage layout if available
if (!empty($website_data['homepageLayout'])) {
  echo $website_data['homepageLayout'];
} else {
  // Fallback: use individual sections
  if (!empty($website_data['heroSection']['customHTML'])) {
    echo $website_data['heroSection']['customHTML'];
  }
  foreach ($website_data['customSections'] ?? [] as $section) {
    echo $section['html'] ?? '';
  }
}
?>
<?php get_footer(); ?>
