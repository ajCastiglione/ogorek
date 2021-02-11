<?php
$s1_title = get_field('s1_title');
$s1_content = get_field('s1_content');
$s1_aside_title = get_field('s1_aside_title');
$s1_aside_content = get_field('s1_aside_content');
$layout = get_field('layout');
$placeholder = get_field('placeholder');
$s3_title = get_field('s3_title');
$s3_text = get_field('s3_text');
$form_id = get_field('form_id');
$form = do_shortcode("[gravityform id=\"{$form_id}\" title=\"false\" description=\"false\"]");
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


  <div class="relevant-articles">
    <div class="col-1">
      <?= get_related_posts($post) ?>
    </div>
  </div>

  <div class="section-3">
    <div class="col-1">
      <h2 class="title"><?= $s3_title ?></h2>
      <div class="text">
        <?= $s3_text ?>
      </div>
      <div class="form">
        <?= $form ?>
      </div>
    </div>
  </div>
</article>