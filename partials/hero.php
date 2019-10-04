<?php
$hero = get_post_type() !== 'team' ? get_field('image') : null;
$hero_title = !is_home() ? get_field('title') : get_field('title', get_option('page_for_posts'));
$hero_content = get_field('hero_content');
if (is_page(460)) {
  $hero_gallery = get_field('images');
  $hero_title = get_field('custom_hero_title');
  $content = get_field('content');
}
?>
<?php if (!is_page(460)) : ?>
  <div class="hero <?php echo $hero ? '' : 'no-image' ?>" style="background-image:url(<?= $hero['url'] ?>)">
    <h1 class="title"><?php echo $hero_title ? $hero_title : get_the_title(); ?></h1>
    <?php if (!empty($hero_content)) : ?>
      <div class="text">
        <?= $hero_content; ?>
      </div>
    <?php endif; ?>
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