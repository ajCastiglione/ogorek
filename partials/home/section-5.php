<?php
$title = get_field('s5_title');
$content = get_field('s5_content');
$aside_title = get_field('s5_aside_title');
$aside_content = get_field('s5_aside_content');
?>

<section class="section-5">
  <div class="col-1 grid-7030">
    <div class="content">
      <h2 class="title"><?= $title ?></h2>
      <div class="text">
        <?= $content ?>
      </div>
    </div>
    <div class="aside">
      <h2 class="aside-title"><?= $aside_title ?></h2>
      <div class="aside-text">
        <?= $aside_content ?>
      </div>
    </div>
  </div>
</section>