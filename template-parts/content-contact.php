<?php
/**
 * Partial for contact page
 *
 * @package minervawebdevelopment
 */

$content_title = get_field( 'left_title' );
$content       = get_field( 'left_content' );
$aside_title   = get_field( 'right_title' );
$aside_content = get_field( 'right_content' );
$phone         = get_field( 'phone_number', 'options' );
$map_embed     = get_field( 'map_embed' );
?>

<article class="contact">
  <?php echo wp_kses_post( get_template_part( 'partials/hero' ) ); ?>

  <section class="entry" id="core">
	<div class="grid-50 col-1">
	  <div class="content">
		<h2 class="title"><?php echo wp_kses_post( $content_title ); ?></h2>
		<div class="text">
	  <?php echo wp_kses_post( $content ); ?>
		</div>
	  </div>
	  <div class="aside">
		<div class="aside-text">
		  <?php if ( ! empty( $map_embed ) ) : ?>
			<h3 class="sub-title">map:</h3>
			<div class="map">
				<?php echo wp_kses_post( $map_embed ); ?>
			</div>
		  <?php endif; ?>
		  <h2 class="aside-title"><?php echo wp_kses_post( $aside_title ); ?></h2>
		  <div class="aside-inner">
			<?php echo wp_kses_post( $aside_content ); ?>
		  </div>
		</div>

		<?php echo wp_kses_post( get_template_part( 'template-parts/content', 'map' ) ); ?>
	  </div>
	</div>
  </section>

</article>
