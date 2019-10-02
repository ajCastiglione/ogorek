<?php
$title = get_field('s6_title');
$content = get_field('s6_content');
$btn = get_field('s6_button_text');
$link = get_field('s6_button_link');
?>
<section class="section-6">
  <div class="content col-1">
    <h2 class="title"><?= $title; ?></h2>
    <div class="text">
      <?= $content; ?>
    </div>
    <div class="btn-container">
      <a href="<?= $link ?>" class="btn"><?= $btn ?></a>
    </div>
  </div>
</section>