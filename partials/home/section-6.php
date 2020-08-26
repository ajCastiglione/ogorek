<?php
$img = get_field('s6_image');
$title = get_field('s6_title');
$content = get_field('s6_content');
?>
<section class="section-6 home-connected">
  <img src="<?= $img['url'] ?>" alt="<?= $img['alt'] ?>" class="home-connected__img">
  <div class="home-connected__info">
    <h2 class="home-connected__title"><?= $title ?></h2>
    <div class="home-connected__content"><?= $content ?></div>
    <div class="home-connected__app">
      <?php if (have_rows('s6_buttons')) : while (have_rows('s6_buttons')) : the_row(); ?>
          <a href="<?= get_sub_field('app_link') ?>" target="_blank">
            <img src="<?= get_sub_field('image') ?>" alt="Download Icon" class="app">
          </a>
      <?php endwhile;
      endif; ?>
    </div>
  </div>
</section>