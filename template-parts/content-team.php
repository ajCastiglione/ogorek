<?php
$title = get_field('content_title');
$content = get_field('content');
$img = get_field('bio_image');
$video = get_field('video_url');
$placeholder = get_field('placeholder');
$email = get_field('email');
$choice = get_field('video_or_image');
?>

<div class="team">
  <div class="col-1 grid-6535">
    <div class="content">
      <h2 class="title"><?= $title ?></h2>
      <div class="text">
        <?= $content ?>
      </div>
      <a href="<?= site_url() ?>/about#team" class="return">return to team</a>
    </div>
    <div class="aside">
      <?php if ($choice === 'image') : ?>
        <img src="<?= $img['url'] ?>" alt="<?= get_the_title() ?>" class="portrait">
      <?php else : ?>
        <div class="video">
          <video controls>
            <source type="video/mp4" src="<?= $video ?>">
          </video>
          <div class="placeholder" style="background-image:url(<?= $placeholder['url'] ?>)"></div>
        </div>
      <?php endif; ?>
      <p>
        <a href="mailto:<?= $email ?>" class="email"><?= $email ?></a>
      </p>
      <div class="socials">
        <?php if (have_rows('social_media')) : while (have_rows('social_media')) : the_row(); ?>
            <a href="<?= get_sub_field('social_url'); ?>" target="_blank" rel="noopener noreferrer" class="social-icon">
              <?= get_sub_field('social_icon'); ?>
            </a>
        <?php endwhile;
        endif; ?>
      </div>
    </div>
  </div>
</div>