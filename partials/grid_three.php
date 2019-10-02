<?php
$img = get_field('mid_image');
$count = 1;
$count2 = 3;
?>

<div class="grid_three grid-col-3 col-1">
  <div class="first-third">
    <?php if (have_rows('first_half')) : while (have_rows('first_half')) : the_row(); ?>
        <?php $title = get_sub_field('title');
            $icon = get_sub_field('icon');
            $desc = get_sub_field('description');   ?>
        <div class="item">
          <h3 class="item-title"><?= $icon ?><?php echo $count++ . '. ' . $title ?></h3>
          <div class="text">
            <?= $desc ?>
          </div>
        </div>
    <?php endwhile;
    endif; ?>
  </div>
  <div class="mid-third">
    <img src="<?= $img['url'] ?>" alt="<?= $img['alt'] ?>" class="image">
  </div>
  <div class="last-third">
    <?php if (have_rows('last_half')) : while (have_rows('last_half')) : the_row(); ?>
        <?php $title = get_sub_field('title');
            $icon = get_sub_field('icon');
            $desc = get_sub_field('description');  ?>
        <div class="item">
          <h3 class="item-title"><?= $icon ?><?php echo $count2++ . '. ' . $title  ?></h3>
          <div class="text">
            <?= $desc ?>
          </div>
        </div>
    <?php endwhile;
    endif; ?>
  </div>
</div>