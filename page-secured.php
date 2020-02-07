<?php
/*
 Template Name: Secured Page
 Template Post Type: post, page, firm
*/
?>

<?php get_header(); ?>

<div id="content">

  <div id="inner-content" class="cf">

    <main id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

            <?= get_template_part('partials/hero') ?>

            <?= get_template_part('template-parts/content', 'secured'); ?>

          </article>

      <?php endwhile;
      endif; ?>

    </main>

  </div>

</div>


<?php get_footer(); ?>