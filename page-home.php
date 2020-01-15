<?php
/*
 Template Name: Home Page Template
*/
?>

<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="cf">

		<main id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

						<?= get_template_part('partials/home/banner'); ?>

						<?php # get_template_part('partials/home/popup'); 
						?>

						<?= get_template_part('partials/home/section-2'); ?>

						<?= get_template_part('partials/home/section-3'); ?>

						<?= get_template_part('partials/home/section-4'); ?>

						<?= get_template_part('partials/home/section-5'); ?>

						<?= get_template_part('partials/home/section-6'); ?>

					</article>

			<?php endwhile;
			endif; ?>

		</main>

	</div>

</div>


<?php get_footer(); ?>