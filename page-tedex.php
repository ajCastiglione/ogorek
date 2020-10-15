<?php
/*
 Template Name: TEdec Express
*/
?>

<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="cf">

		<main id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

						<?= get_template_part('partials/hero'); ?>

						<section class="entry-content col-1 cf" itemprop="articleBody">

							<?php the_content(); ?>

							<div class="tedex-comparison">
								<?php if (have_rows('content_comparison')) : while (have_rows('content_comparison')) : the_row();
										$title = get_sub_field('title');
										$examples_image = get_sub_field('examples_image');
										$examples = get_sub_field('examples');
										$results_image = get_sub_field('results_image');
										$results = get_sub_field('results');
								?>

										<div class="tedex-comparison__single">
											<h3 class="tedex-comparison__title"><?= $title ?></h3>
											<div class="tedex-comparison__examples tedex-comparison__item">
												<img src="<?= $examples_image['url'] ?>" alt="<?= $examples_image['alt'] ?>">
												<div class="item-content"><?= $examples ?></div>
											</div>
											<div class="tedex-comparison__results tedex-comparison__item">
												<img src="<?= $results_image['url'] ?>" alt="<?= $results_image['alt'] ?>">
												<div class="item-content"><?= $results ?></div>
											</div>
										</div>

								<?php endwhile;
								endif; ?>
							</div>

							<div class="tedex-benefits">
								<?php if (have_rows('content_benefits')) : while (have_rows('content_benefits')) : the_row();
										$title = get_sub_field('title');
										$image_or_video = get_sub_field('image_or_video');
										$image = get_sub_field('image');
										$video = get_sub_field('video');
										$content = get_sub_field('content');
								?>

										<div class="tedex-benefits__single">
											<div class="tedex-benefits__content">
												<?php if ($image_or_video == 'img') : ?>
													<img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
												<?php else : ?>
													<?= $video ?>
												<?php endif; ?>
												<div class="tedex-benefits__points">
													<h3 class="tedex-benefits__title"><?= $title ?></h3>
													<?= $content ?>
												</div>
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