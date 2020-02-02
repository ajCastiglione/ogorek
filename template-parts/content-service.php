<?php
$s1_title = get_field('s1_title');
$s1_content = get_field('s1_content');
$s1_aside_title = get_field('s1_aside_title');
$s1_aside_content = get_field('s1_aside_content');
$layout = get_field('layout');
$placeholder = get_field('placeholder');
?>

<article class="service">
  <?= get_template_part('partials/hero'); ?>
  <?php if (!empty($s1_title) || !empty($s1_content)) : ?>
    <section class="section-1">
      <div class="col-1 grid-50">
        <div class="content">
          <h2 class="title"><?= $s1_title ?></h2>
          <div class="text">
            <?= $s1_content ?>
          </div>
        </div>
        <div class="aside">
          <h2 class="aside-title"><?= $s1_aside_title ?></h2>
          <div class="aside-text">
            <?= $s1_aside_content ?>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php if (get_field('layout') !== 'unused') : ?>
    <section class="section-2">
      <?php $layout === 'grid_three' ? get_template_part('partials/grid_three') : get_template_part('partials/alternating'); ?>
      <span style="display: none" data-src="<?= $placeholder ?>" id="span-placeholder"></span>
    </section>
  <?php endif; ?>
</article>