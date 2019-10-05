<?php
if (wp_get_post_parent_id($post) === 650 || wp_get_post_parent_id($post) === 1296 || $post->ID === 1296) {
	get_template_part('index');
} else {
	?>

	<?php get_header(); ?>

	<div id="content">

		<div id="inner-content" class="wrap cf">

			<main id="main" class="col-xs-12 col-sm-8 col-lg-8 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

							<header class="article-header">

								<h1 class="page-title"><?php the_title(); ?></h1>

							</header>

							<section class="entry-content cf" itemprop="articleBody">
								<?php the_content(); ?>

							</section>

							<footer class="article-footer cf">

							</footer>

							<?php comments_template(); ?>

						</article>

				<?php endwhile;
					endif; ?>

			</main>

			<?php get_sidebar(); ?>

		</div>

	</div>

	<?php get_footer(); ?>

<?php } ?>