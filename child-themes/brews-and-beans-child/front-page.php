<?php
get_header();
$data = [];
$path = ABSPATH . 'website.json';
if (file_exists($path)) {
  $json = file_get_contents($path);
  $decoded = json_decode($json, true);
  if (is_array($decoded)) { $data = $decoded; }
}
?>
<main id="main">
  <?php
    echo $data['heroSection']['customHTML'] ?? '';
    if (!empty($data['customSections']) && is_array($data['customSections'])) {
      foreach ($data['customSections'] as $section) {
        echo $section['html'] ?? '';
      }
    }
  ?>
</main>
<?php get_footer(); ?>
