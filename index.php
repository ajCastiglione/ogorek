<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="cf">

		<main id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<!-- Hero -->
			<?= get_template_part('partials/hero'); ?>

			<!-- Header -->
			<header class="blog-header">
				<h1 class="title">Blog</h1>
				<?= get_search_form(); ?>
			</header>

			<!-- Content for blog page -->
			<?= get_template_part('template-parts/content', 'posts'); ?>

		</main>

		<?php get_sidebar(); ?>

	</div>

</div>


<?php get_footer(); ?>