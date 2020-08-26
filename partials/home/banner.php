<?php
$bg = get_field('s1_background_image');
$title = get_field('s1_title');
$subtitle = get_field('s1_sub_title');
?>
<!-- Banner Area -->
<section class="banner col-1">
  <img src="<?= $bg['url'] ?>" alt="<?= $bg['alt'] ?>" class="banner__img">
  <div class="banner__content">
    <h1 class="banner__title"><?= $title ?></h1>
    <h2 class="banner__sub-title"><?= $subtitle ?></h2>
    <div class="banner__ctas">
      <?php if (have_rows('s1_call_to_actions')) : while (have_rows('s1_call_to_actions')) : the_row();
          $arrow = get_sub_field('has_arrow') ? '<i class="fas fa-arrow-right"></i>' : null;
          $txt = get_sub_field('button_text');
          $link = get_sub_field('button_link');
      ?>
          <a href="<?= $link ?>" class="banner__btn <?= $arrow ? 'has-arrow' : null ?>">
            <?php if ($arrow) : ?>
              <span><?= $txt ?></span>
              <?= $arrow ?>
            <?php else : echo $txt;
              echo $arrow;
            endif; ?>

          </a>
      <?php endwhile;
      endif; ?>
    </div>
  </div>
</section>
<!-- end Banner Area -->