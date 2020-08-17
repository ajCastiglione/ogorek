<?php
/*
 Template Name: Video Commentaries
*/
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
  'post_type' => 'video_commentaries',
  'posts_per_page' => 9,
  'paged' => $paged
);

$query = new WP_Query($args);

?>

<?php get_header(); ?>

<div id="content">

  <div id="inner-content" class="cf">

    <main id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

      <?= get_template_part('partials/hero'); ?>

      <article class="video-commentaries">

        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

            <div class="video-commentary">
              <header class="video-header">

                <div class="featured-image-container">
                  <a href="<?= the_permalink() ?>" class="video-link">
                    <img src="<?= get_the_post_thumbnail_url($post->ID, 'large') ?>" alt="<?= the_title() ?>" class="video-image">
                    <span class="overlay"><i class="far fa-file-alt"></i></span>
                  </a>
                </div>

                <h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

              </header>

              <section class="excerpt-content cf">
                <a href="<?= the_permalink() ?>" class="video-link">
                  <?php
                  $meta = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true);
                  echo !empty($meta) ? $meta : get_field('video_excerpt');
                  ?>
                </a>
              </section>
            </div>

        <?php endwhile;
        endif;
        wp_reset_query(); ?>

        <?php bones_page_navi($query); ?>

      </article>

    </main>

  </div>

</div>


<?php get_footer(); ?>