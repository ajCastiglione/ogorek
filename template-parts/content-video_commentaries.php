<?php
$excerpt = get_field( 'video_excerpt' );
$content = get_the_content();
$vid     = get_field( 'video_url' );
$related = get_field( 'related_video_commentaries' );

$cta_text       = get_field( 'blog_cta_text', 'options' );
$cta_link       = get_field( 'blog_cta_link', 'options' );
$cta_text_blurb = get_field( 'blog_cta_text_blurb', 'options' );

$date = get_the_date( 'm/d/Y' );
?>

<?php echo get_template_part( 'partials/hero' ); ?>

<article class="video-single">
	<section class="large-wrapper<?php echo ! empty( $related ) ? ' grid' : null; ?>">
		<?php echo ! empty( $related ) ? '<div class="content-wrap">' : null; ?>
		<div class="video"><?php echo $vid; ?></div>
		<h4 class="date">Published on: <?php echo $date; ?></h4>
		<div class="content">
			<?php echo $content; ?>
			<div class="contact-cta">
				<div class="cta-text"><?php echo $cta_text_blurb; ?></div>
				<div class="cta-link"><a href="<?php echo $cta_link; ?>"><?php echo $cta_text; ?> <i class="fas fa-arrow-right"></i></a></div>
			</div>
			<?php
			if ( comments_open() ) :
				get_template_part( 'template-parts/comments' );
			endif;
			?>
		</div>
		<?php echo ! empty( $related ) ? '</div>' : null; ?>
		<?php if ( ! empty( $related ) ) : ?>
			<div>
				<?php echo get_related_videos( $post ); ?>
			</div>
		<?php endif; ?>


	</section>
</article>
