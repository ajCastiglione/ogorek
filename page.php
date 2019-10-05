<?php
if (wp_get_post_parent_id($post) === 650 || wp_get_post_parent_id($post) === 1296 || $post->ID === 1296) {
	get_template_part('index');
} else {
	?>

	<?php get_header(); ?>

	<div id="content">

		<div id="inner-content" class="cf">

			<main id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

							<?= get_template_part('partials/hero'); ?>

							<section class="entry-content col-1 cf" itemprop="articleBody">
								<?php if (have_rows('values')) : echo '<div class="hotlinks">';
												while (have_rows('values')) : the_row(); ?>
										<div class="hotlink">
											<a href="<?= get_sub_field('link') ?>" class="link">
												<img src="<?= get_sub_field('icon')['url'] ?>" alt="Icon" class="icon">
												<span><?= get_sub_field('title') ?></span>
											</a>
										</div>
								<?php endwhile;
												echo '</div>';
											endif; ?>
								<?php the_content(); ?>
							</section>

							<?php if (have_rows('store_locations')) : echo '<div class="app-locations"><h2 class="sub-title">' . get_field('app_title') . '</h2>';
											while (have_rows('store_locations')) : the_row(); ?>
									<div class="app-dl">
										<a href="<?= get_sub_field('link') ?>" target="_blank" rel="noopener noreferrer"><img src="<?= get_sub_field('image')['url']; ?>" alt="App Location"></a>
									</div>
							<?php endwhile;
											echo '</div>';
										endif; ?>

						</article>

				<?php endwhile;
					endif; ?>

			</main>

		</div>

	</div>

	<?php get_footer(); ?>

<?php } ?>