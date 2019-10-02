<?php
$hero = get_field('image');
$hero_title = get_field('title');
if (is_page(460)) {
  $hero_gallery = get_field('images');
  $hero_title = get_field('custom_hero_title');
  $content = get_field('content');
}
?>
<?php if (!is_page(460)) : ?>
  <div class="hero" style="background-image:url(<?= $hero['url'] ?>)">
    <h1 class="title"><?= $hero_title ?></h1>
  </div>
<?php else : ?>
  <div class="hero-large">
    <div class="grid-col-3">
      <?php foreach ($hero_gallery as $image) : ?>
        <div class="img-container">
          <img src="<?= $image['url'] ?>" alt="" class="hero-imgs">
        </div>
      <?php endforeach; ?>
    </div>
    <h1 class="title"><?= $hero_title ?></h1>
    <div class="text">
      <?= $content ?>
    </div>
  </div>
<?php endif; ?>