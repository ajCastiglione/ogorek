<?php
$args = array(
  'post_type' => 'team',
  'posts_per_page' => -1,
  'orderby' => "menu_order"
);
$title = get_field('team_title');
$per_row = get_field('per_row');
$query = new WP_Query($args);
?>

<div id="team" class="team-members">
  <h2 class="title"><?= $title ?></h2>
  <div class="team-grid col-1 <?= $per_row ?>">
    <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
        <?php
            $img = get_field('team_member_photo');
            $name = get_the_title();
            $pos = get_field('position_title');
            $link = get_permalink();
            ?>
        <div class="member">
          <a href="<?= $link ?>">
            <img src="<?= $img['url'] ?>" alt="<?= $name ?>" class="portrait">
            <h3 class="name"><?= $name ?></h3>
            <p class="position"><?= $pos ?></p>
          </a>
          <div class="btn-container">
            <a href="<?= $link ?>" class="btn">read bio <i class="fas fa-long-arrow-alt-right"></i></a>
          </div>
        </div>
    <?php endwhile;
    endif; ?>
  </div>
</div>