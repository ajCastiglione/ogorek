<?php
/*
 Template Name: Video Commentaries
*/

$args = array(
  'post_type' => 'video_commentaries',
  'posts_per_page' => 6,
);

$query = new WP_Query($args);

?>

<?php get_header(); ?>

<div id="content">

  <div id="inner-content" class="cf">

    <main id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

      <?= get_template_part('partials/hero'); ?>

      <article class="wrap">

        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

            <section id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

              <h2 class="video-title"><?= the_title(); ?></h2>

              <div class="video-content"><?= the_content(); ?></div>

            </section>

        <?php endwhile;
        endif;
        wp_reset_query(); ?>

        <?php bones_page_navi($query); ?>

      </article>

    </main>

  </div>

</div>


<?php get_footer(); ?>