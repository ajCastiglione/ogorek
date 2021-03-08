<?php get_header(); ?>

<div id="content">

	<div id="inner-content">

		<main id="main" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?= get_template_part('partials/hero'); ?>

						<section class="entry-content wrap">
							<?php the_content(); ?>
						</section>

					</article>

			<?php endwhile;
			endif; ?>

		</main>

	</div>

</div>

<?php get_footer(); ?>