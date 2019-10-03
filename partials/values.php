<?php $values_title = get_field('values_title') ?>

<div class="values" id="mission">
  <h2 class="title"><?= $values_title ?></h2>
  <div class="grid-col-3">
    <?php if (have_rows('values')) : while (have_rows('values')) : the_row(); ?>
        <?php $icon = get_sub_field('icon');
            $title = get_sub_field('title');
            $content = get_sub_field('content'); ?>
        <div class="value">
          <?= $icon ?>
          <h3 class="value-title"><?= $title ?></h3>
          <div class="text">
            <?= $content ?>
          </div>
        </div>
    <?php endwhile;
    endif; ?>
  </div>

</div>