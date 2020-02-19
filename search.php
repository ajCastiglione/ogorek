<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="wrap cf">

		<main id="main" class="cf col-xs-12 col-sm-8 col-lg-8" role="main">
			<h1 class="archive-title"><span><?php _e('Search Results for:', 'bonestheme'); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

						<header class="entry-header article-header">

							<?php if (get_the_post_thumbnail_url()) : ?>
								<img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_title() ?>" class="featured-image">
							<?php endif; ?>

							<h3 class="search-title title entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

							<p class="byline entry-meta vcard">
								<?php printf(
									__('%1$s | %2$s | %3$s', 'bonestheme'),
									/* the author of the post */
									'<span class="by">by</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link(get_the_author_meta('ID')) . '</span>',
									/* the time the post was published */
									'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
									get_the_category_list(', ') != '' ? get_the_category_list(', ') : ''
								); ?>
							</p>

						</header>

						<section class="entry-content">
							<?php the_excerpt('<span class="read-more">' . __('Read more &raquo;', 'bonestheme') . '</span>'); ?>

						</section>

					</article>

				<?php endwhile; ?>

				<?php bones_page_navi(); ?>

			<?php else : ?>

				<article id="post-not-found" class="hentry cf">
					<header class="article-header">
						<h1><?php _e('Sorry, No Results.', 'bonestheme'); ?></h1>
					</header>
					<section class="entry-content">
						<p><?php _e('Try your search again.', 'bonestheme'); ?></p>
					</section>
					<footer class="article-footer">
						<p><?php _e('Please contact a member of the team if you cannot find what you are looking for.', 'bonestheme'); ?></p>
					</footer>
				</article>

			<?php endif; ?>

		</main>

		<?php get_sidebar(); ?>

	</div>

</div>

<?php get_footer(); ?>