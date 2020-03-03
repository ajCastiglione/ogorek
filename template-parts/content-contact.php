<?php
$title = get_field('left_title');
$content = get_field('left_content');
$aside_title = get_field('right_title');
$aside_content = get_field('right_content');
$phone = get_field('phone_number', 'options');
$map = get_field('map_embed');
?>

<article class="contact">
  <?= get_template_part('partials/hero'); ?>

  <section class="entry" id="core">
    <div class="grid-6535 col-1">
      <div class="content">
        <h2 class="title"><?= $title ?></h2>
        <div class="text">
          <?= $content ?>
        </div>
      </div>
      <div class="aside">
        <h2 class="aside-title"><?= $aside_title ?></h2>
        <div class="aside-text">
          <div class="aside-inner">
            <?= $aside_content ?>
          </div>
          <h3 class="sub-title">call us:</h3>
          <a href="tel:+<?= $phone ?>" class="phone"><?= $phone ?></a>
          <h3 class="sub-title">Follow Us:</h3>
          <div class="socials">
            <?php if (have_rows('social_media', 'options')) : while (have_rows('social_media', 'options')) : the_row(); ?>
                <a href="<?= get_sub_field('social_url'); ?>" target="_blank" rel="noopener noreferrer" class="social-icon">
                  <?= (get_sub_field('icon_or_svg')) ? get_sub_field('social_icon') : '<figure>' . get_sub_field('social_icon_svg') . '</figure>'; ?>
                </a>
            <?php endwhile;
            endif; ?>
          </div>
          <h3 class="sub-title">map:</h3>
          <div class="map">
            <?= $map ?>
          </div>
        </div>
      </div>
    </div>
  </section>

</article>