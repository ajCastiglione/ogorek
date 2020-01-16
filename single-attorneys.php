<?php
/*
 Single Attorney Template
*/
?>

<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="cf">

		<main id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

						<?php get_template_part('partials/hero') ?>

						<section class="entry-content large-wrapper cf">
							<h2 class="subtitle">Trusts: </h2>
							<div class="grid">
								<?php if (have_rows('forms')) : while (have_rows('forms')) : the_row(); ?>
										<div class="form">
											<h3 class="form-title"><?= get_sub_field('form_title') ?></h3>
											<a href="<?= get_sub_field('form_url') ?>" class="btn <?= get_sub_field('is_complete') ? 'completed' : null ?>" target="_blank" aria-label="Button to view form"><?= get_sub_field('is_complete') ? 'form completed' : 'view form' ?></a>
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