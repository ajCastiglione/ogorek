<?php
/*
 Template Name: Video Commentaries
*/
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args  = array(
	'post_type'      => 'video_commentaries',
	'posts_per_page' => 9,
	'paged'          => $paged,
);

if ( isset( $_GET['cat'] ) ) {
	$category          = wp_kses_data( $_GET['cat'] );
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'video_category',
			'field'    => 'slug',
			'terms'    => $category,
		),
	);

}

$query = new WP_Query( $args );

?>

<?php get_header(); ?>

<div id="content">

  <div id="inner-content" class="cf">

	<main id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

	  <?php echo get_template_part( 'partials/hero' ); ?>

		<!-- Categories -->
	<?php
	if ( ! isset( $_GET['cat'] ) ) {
		$link_class = 'link active';
	} else {
		$link_class = 'link';
	}
	?>
			<div class="categories col-1">
				<div class="category">
					<a href="<?php echo site_url(); ?>/vid-commentaries" class="<?php echo $link_class; ?>">
					<i class="far cat-icon-i fa-circle"></i>
						<h3 class="cat-title">All</h3>
					</a>
				</div>
				<?php
				$cats = get_categories(
					array(
						'taxonomy' => 'video_category',
						'orderby'  => 'menu_order',
					)
				);
				foreach ( $cats as $cat ) {
					$icon       = get_field( 'icon', $cat );
					$link_class = 'link';

					if ( isset( $_GET['cat'] ) && strstr( strtolower( $cat->slug ), strtolower( $_GET['cat'] ) ) ) {
						$link_class .= ' active';
					}
					?>
					<div class="category">
						<a href="?cat=<?php echo $cat->slug; ?>" class="<?php echo $link_class; ?>">
							<img src="<?php echo $icon; ?>" alt="<?php echo $cat->name; ?>" class="cat-icon">
							<h3 class="cat-title"><?php echo $cat->name; ?></h3>
						</a>
					</div>
				<?php } ?>
			</div>

	  <article class="video-commentaries">

		<?php
		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) :
				$query->the_post();
				?>

			<div class="video-commentary">
			  <header class="video-header">

				<div class="featured-image-container">
				  <a href="<?php echo esc_url( the_permalink() ); ?>" class="video-link">
					<img src="<?php echo esc_url( get_the_post_thumbnail_url( $post->ID, 'large' ) ); ?>" alt="<?php echo the_title(); ?>" class="video-image">
					<span class="overlay"><i class="far fa-file-alt"></i></span>
				  </a>
				</div>

				<h1 class="h2 entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

			  </header>

			  <section class="excerpt-content cf">
				<a href="<?php echo esc_url( the_permalink() ); ?>" class="video-link">
							  <?php
								$meta = get_post_meta( get_the_ID(), '_yoast_wpseo_metadesc', true );
								echo ! empty( $meta ) ? $meta : get_field( 'video_excerpt' );
								?>
				</a>
			  </section>
			</div>

					<?php
		endwhile;
		endif;
		wp_reset_postdata();
		?>

		<?php bones_page_navi( $query ); ?>

	  </article>

	</main>

  </div>

</div>


<?php get_footer(); ?>
