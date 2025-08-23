<?php
get_header();

$data = [];
$path = ABSPATH . 'website.json';
if (file_exists($path)) {
  $json = file_get_contents($path);
  $decoded = json_decode($json, true);
  if (is_array($decoded)) { $data = $decoded; }
}

$heroHtml = $data['heroSection']['customHTML'] ?? '';
$heroImg  = $data['heroSection']['heroImage'] ?? get_stylesheet_directory_uri() . '/assets/img/hero.jpg';

$echo_wrapped = function(string $html) {
  if ($html === '') return;
  if (strpos($html, 'container') !== false) { echo $html; return; }
  echo '<section class="py-16"><div class="container">'.$html.'</div></section>';
};
?>
<main id="main">
  <section class="hero-section relative">
    <img src="<?php echo esc_url($heroImg); ?>" alt="" class="absolute inset-0 w-full h-full object-cover opacity-40" />
    <div class="relative container py-24 md:py-40 text-center text-white">
      <?php
        if ($heroHtml) {
          echo $heroHtml;
        } else {
          echo '<h1 class="text-4xl md:text-6xl font-extrabold">'. esc_html(get_bloginfo('name')) .'</h1>';
          echo '<p class="mt-4 text-xl">'. esc_html(get_bloginfo('description')) .'</p>';
        }
      ?>
    </div>
  </section>

  <?php
    if (!empty($data['customSections']) && is_array($data['customSections'])) {
      foreach ($data['customSections'] as $section) {
        $html = isset($section['html']) && is_string($section['html']) ? $section['html'] : '';
        $echo_wrapped($html);
      }
    }

    if (empty($data['heroSection']) && !empty($data['homepageLayout']) && is_string($data['homepageLayout'])) {
      echo $data['homepageLayout'];
    }
  ?>
</main>
<?php get_footer(); ?>
