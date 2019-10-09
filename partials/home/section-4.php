<?php $title = get_field('s4_title');
$content = get_field('s4_content');
$url = get_field('video_url');
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
      <iframe width="560" height="315" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="yt-video" data-src="<?= $url; ?>"></iframe>
      <div style="background-image:url(<?= $img['url']; ?>)" class="placeholder"></div>
    </div>
  </div>
</section>