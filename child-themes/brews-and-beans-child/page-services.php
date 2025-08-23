<?php
get_header();
$website_data = [];
$path = ABSPATH . 'website.json';
if (file_exists($path)) {
  $json = file_get_contents($path);
  $decoded = json_decode($json, true);
  if (is_array($decoded)) { $website_data = $decoded; }
}
$customLayout = $website_data['servicesPageLayout'] ?? '<div class="container py-20"><h1 class="section-title">Our Services</h1></div>';
echo $customLayout;
get_footer();
?>
