<?php
/*
 Single Attorney Template
*/
$term_obj_list = get_the_terms($post->ID, 'firm');
$tax_slug = join(', ', wp_list_pluck($term_obj_list, 'slug'));
$cur_id = $post->ID;
$args = array(
	'posts_per_page' => -1,
	'tax_query' => array(
		array(
			'taxonomy' => 'firm',
			'field' => 'slug',
			'terms' => $tax_slug
		)
	)
);
$query = new WP_Query($args);
?>

<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="cf">

		<main id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

						<?php get_template_part('partials/hero') ?>

						<section class="entry-content large-wrapper layout-grid">
							<div class="main-content">
								<?php if (have_rows('form_group')) : while (have_rows('form_group')) : the_row(); ?>
										<h2 class="subtitle"><?= get_sub_field('group_title') ?></h2>
										<div class="grid">
											<?php if (have_rows('forms')) : while (have_rows('forms')) : the_row(); ?>
													<div class="form">
														<h3 class="form-title"><?= get_sub_field('form_title') ?></h3>
														<a href="<?= get_sub_field('form_url') ?>" class="btn <?= get_sub_field('is_complete') ? 'completed' : null ?>" target="_blank" aria-label="Button to view form"><?= get_sub_field('is_complete') ? 'form completed' : 'view form' ?></a>
													</div>
											<?php endwhile;
											endif; ?>
										</div>
								<?php endwhile;
								endif; ?>
							</div>

							<aside class="sidebar">
								<h2 class="sidebar-title">Attorneys</h2>
								<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
										<a href="<?= the_permalink() ?>" class="att-link <?php if ($cur_id == get_the_ID()) echo 'current' ?>">
											<h3 class="name"><?= get_the_title() ?></h3>
										</a>
								<?php endwhile;
								endif; ?>
							</aside>

						</section>

					</article>

			<?php endwhile;
			endif; ?>

		</main>

	</div>

</div>

<?php get_footer(); ?>