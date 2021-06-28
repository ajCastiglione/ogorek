<?php
/*
 Template Name: TEdec Express
*/

$cta = get_field('content_cta');
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
										$examples = get_sub_field('examples_fields');
										$results_image = get_sub_field('results_image');
										$results = get_sub_field('results');
										$results_title = get_sub_field('results_title');
								?>

										<div class="tedex-comparison__single">
											<h3 class="tedex-comparison__title"><?= $title ?></h3>
											<div class="tedex-comparison__examples tedex-comparison__item">
												<div class="item-content">
													<ol class="examples-list">
														<?php foreach ($examples as $example) : ?>
															<div class="inner-list">
																<?= $example['icon'] ?>
																<li><?= $example['text']; ?></li>
															</div>
														<?php endforeach; ?>
													</ol>
												</div>
											</div>
											<div class="tedex-comparison__results tedex-comparison__item">
												<h3><?= $results_title ?></h3>
												<div class="grid">
													<img src="<?= $results_image['url'] ?>" alt="<?= $results_image['alt'] ?>">
													<div class="item-content"><?= $results ?></div>
												</div>
											</div>
										</div>

								<?php endwhile;
								endif; ?>
							</div>

							<div class="tedex-benefits">
								<?php if (have_rows('content_benefits')) : while (have_rows('content_benefits')) : the_row();
										$image_or_video = get_sub_field('image_or_video');
										$image = get_sub_field('image');
										$video = get_sub_field('video');
								?>

										<div class="tedex-benefits__single">
											<div class="tedex-benefits__content">
												<?php if ($image_or_video == 'img') : ?>
													<img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
												<?php else : ?>
													<?= $video ?>
												<?php endif; ?>
											</div>
										</div>

								<?php endwhile;
								endif; ?>
							</div>

							<div class="tedex-cta">
								<a href="<?= $cta['link'] ?>" class="tedex-cta__btn"><?= $cta['text'] ?></a>
							</div>

						</section>

					</article>

			<?php endwhile;
			endif; ?>

		</main>

	</div>

</div>

<?php get_footer(); ?>