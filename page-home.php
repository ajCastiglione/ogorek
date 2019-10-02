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

						<!-- Banner Area -->
						<section class="hero col-1">
							<div class="slider">
								<?php if (have_rows('slider')) : while (have_rows('slider')) : the_row(); ?>
										<div class="slide" style="background-image:url(<?= get_sub_field('image')['url']; ?>)">
											<div class="slide-content">
												<h2 class="slide-title"><?= get_sub_field('title'); ?></h2>
												<div class="slide-text">
													<?= get_sub_field('content'); ?>
												</div>
												<a href="<?= get_sub_field('button_link'); ?>" class="slide-link"><?= get_sub_field('button_text'); ?></a>
											</div>
										</div>
								<?php endwhile;
										endif; ?>
							</div>
						</section>
						<!-- end Banner Area -->

						<section class="section-2 cf col-1" itemprop="articleBody">
							<div class="grid-7030">
								<div class="content">
									<?= the_content(); ?>
								</div>
								<img src="<?= get_field('mc_img')['url']; ?>" alt="eye on the future - ogorek wealth management" class="mc_img">
							</div>
						</section>

						<section class="section-3">
							<div class="col-1 grid-col-4">
								<?php if (have_rows('benefits')) : while (have_rows('benefits')) : the_row(); ?>
										<div class="item">
											<a href="<?= get_sub_field('button_link'); ?>" class="cta"><?= get_sub_field('cta'); ?></a>
											<div class="content">
												<?= get_sub_field('content'); ?>
											</div>
											<div class="btn-container">
												<a href="<?= get_sub_field('button_link'); ?>" class="btn"><?= get_sub_field('button_text'); ?></a>
											</div>
										</div>
								<?php endwhile;
										endif; ?>
							</div>
						</section>

					</article>

			<?php endwhile;
			endif; ?>

		</main>

	</div>

</div>


<?php get_footer(); ?>