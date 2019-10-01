<?php
/*
 Template Name: Home Page Template
*/
?>

<?php get_header(); ?>

<!-- Banner Area -->
<section class="hero">
	<div class="slider">
		<?php if (have_rows('slider')) : while (have_rows('slider')) : the_row(); ?>
				<div class="slide" style="background-image:url(<?= get_sub_field('image')['url']; ?>)">
					<h2 class="slide-title"><?= get_sub_field('title'); ?></h2>
					<div class="slide-content">
						<?= get_sub_field('content'); ?>
						<a href="<?= get_sub_field('button_link'); ?>" class="slide-link"><?= get_sub_field('button_text'); ?></a>
					</div>
				</div>
		<?php endwhile;
		endif; ?>
	</div>

</section>
<!-- end Banner Area -->


<div id="content">

	<div id="inner-content" class="wrap cf">

		<main id="main" class="cf col-xs-12 col-sm-8 col-lg-8" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

						<header class="article-header">
							<h1 class="page-title"><?php the_title(); ?></h1>
						</header>

						<section class="entry-content cf" itemprop="articleBody">
							<?php the_content(); ?>
						</section>

					</article>

			<?php endwhile;
			endif; ?>

		</main>

		<?php get_sidebar(); ?>

	</div>

</div>


<?php get_footer(); ?>