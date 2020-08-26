<?php
$img = get_field('s3_image');
$title = get_field('s3_title');
$content = get_field('s3_content');
?>

<section class="section-3 home-services">
  <img class="home-services__img" src="<?= $img['url'] ?>" alt="<?= $img['alt'] ?>">
  <div class="home-services__info">
    <h2 class="home-services__title"><?= $title ?></h2>
    <div class="home-services__content"><?= $content ?></div>
    <div class="home-services__services">
      <?php if (have_rows('s3_services')) : while (have_rows('s3_services')) : the_row();
          $s_title = get_sub_field('title');
          $s_content = get_sub_field('content');
          $button_text = get_sub_field('button_text');
          $button_link = get_sub_field('button_link');
      ?>

          <div class="service">
            <a href="<?= $button_link ?>">
              <h3 class="service-title"><?= $s_title ?></h3>
              <div class="service-content"><?= $s_content ?></div>
              <span class="service-cta"><?= $button_text ?></span>
            </a>
          </div>

      <?php endwhile;
      endif; ?>
    </div>
  </div>
</section>