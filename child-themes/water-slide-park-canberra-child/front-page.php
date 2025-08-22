<?php get_header(); ?>
<?php
$website_data = json_decode(file_get_contents(ABSPATH . 'website.json'), true);

// Safely output AI-generated homepage layout
$homepageLayout = $website_data['homepageLayout'] ?? '';
if (!empty($homepageLayout)) {
  echo wp_kses_post($homepageLayout);
} else {
  // Fallback: use individual sections
  $heroHTML = $website_data['heroSection']['customHTML'] ?? '';
  if (!empty($heroHTML)) {
    echo wp_kses_post($heroHTML);
  }
  
  $customSections = $website_data['customSections'] ?? [];
  foreach ($customSections as $section) {
    $sectionHTML = $section['html'] ?? '';
    if (!empty($sectionHTML)) {
      echo wp_kses_post($sectionHTML);
    }
  }
}
?>
