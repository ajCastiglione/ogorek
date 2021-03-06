<?php
/*
 Template Name: Landing Page for PPC
*/
?>

<?php get_header(); ?>

<div id="content" class="landing-page-content">

  <div id="inner-content" class="cf">

    <main id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class('cf landing-page'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

            <?= get_template_part('partials/landing', 'hero') ?>

            <?= get_template_part('template-parts/landing', 'marketing'); ?>

          </article>

      <?php endwhile;
      endif; ?>

    </main>

  </div>

</div>

<?= get_template_part('template-parts/landing', 'footer') ?>
<?php get_footer(); ?>