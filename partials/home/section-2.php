<?php
$title = get_field('s2_title');
$content = get_field('s2_content');
?>

<section class="section-2 col-1 home-values">
  <h2 class="home-values__title"><?= $title ?></h2>
  <div class="home-values__content"><?= $content ?></div>
  <div class="home-values__rows grid-col-4">
    <?php if (have_rows('s2_values')) : while (have_rows('s2_values')) : the_row();
        $icon = get_sub_field('icon');
        $value_title = get_sub_field('title');
        $value_content = get_sub_field('content');
        $value_link = get_sub_field('link');
    ?>

        <div class="value">
          <?php // <a href="<?= $value_link ?/>"> 
          ?>
          <?= $icon ?>
          <h3 class="value-title"><?= $value_title ?></h3>
          <div class="value-content"><?= $value_content ?></div>
          <?php // <span class="value-cta">learn more</span> 
          ?>
          <?php //</a> 
          ?>
        </div>

    <?php endwhile;
    endif; ?>
  </div>
</section>