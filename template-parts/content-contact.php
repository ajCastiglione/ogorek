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
    <div class="grid-50 col-1">
      <div class="content">
        <h2 class="title"><?= $title ?></h2>
        <div class="text">
          <?= $content ?>
        </div>
      </div>
      <div class="aside">
        <div class="aside-text">
          <?php if (!empty($map)) : ?>
            <h3 class="sub-title">map:</h3>
            <div class="map">
              <?= $map ?>
            </div>
          <?php endif; ?>
          <h2 class="aside-title"><?= $aside_title ?></h2>
          <div class="aside-inner">
            <?= $aside_content ?>
          </div>
        </div>
      </div>
    </div>
  </section>

</article>