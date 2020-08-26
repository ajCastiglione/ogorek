<?php
$title = get_field('s4_title');
$content = get_field('s4_content');
$txt = get_field('s4_cta_text');
$link = get_field('s4_cta_link');

$args = array(
  'post_type' => 'team',
  'posts_per_page' => -1,
  'orderby' => "menu_order"
);
$team = new WP_Query($args);

?>
<section class="section-4 col-1 home-team">

  <h2 class="home-team__title"><?= $title ?></h2>
  <div class="home-team__content"><?= $content ?></div>

  <div class="home-team__slider owl-theme owl-carousel">
    <?php if ($team->have_posts()) : while ($team->have_posts()) : $team->the_post();
        $img = get_field('team_member_photo');
        $name = get_the_title();
        $pos = get_field('position_title');
        $link = get_permalink();
    ?>

        <div class="team-member ">
          <a href="<?= $link ?>" class="team-member_link">
            <img src="<?= $img['url'] ?>" alt="<?= $name ?>" class="team-member_img">
            <div class="info">
              <h3 class="team-member_name"><?= $name ?></h3>
              <h4 class="team-member_position"><?= $pos ?></h4>
            </div>
          </a>
        </div>

    <?php endwhile;
    endif;
    wp_reset_postdata(); ?>

  </div>

  <a href="<?= $link ?>" class="home-team__cta"><?= $txt ?></a>

</section>