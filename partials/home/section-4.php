<?php $title = get_field('s4_title');
$content = get_field('s4_content');
$iframe = get_field('video_url');
$img = get_field('video_placeholder_img');  ?>
<section class="section-4 col-1">
  <div class="grid-50">
    <div class="content">
      <h2 class="title"><?= $title; ?></h2>
      <div class="text">
        <?= $content; ?>
      </div>
    </div>
    <div class="video">
      <?= $iframe ?>
      <div style="background-image:url(<?= $img['url']; ?>)" class="placeholder"></div>
    </div>
  </div>
</section>