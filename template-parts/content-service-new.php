<?php
/**
 * Partial for new service template
 *
 * @package minervawebdevelopment
 */

$s1_title         = get_field( 's1_title' );
$s1_content       = get_field( 's1_content' );
$s1_aside_title   = get_field( 's1_aside_title' );
$s1_aside_content = get_field( 's1_aside_content' );
$s2_title         = get_field( 's2_title' );

$container_class = 'col-1';
if ( ! empty( $s1_aside_content ) ) {
	$container_class .= ' grid-50';
}
?>

<article class="service">
	<?php echo wp_kses_post( get_template_part( 'partials/hero' ) ); ?>
	<?php if ( ! empty( $s1_title ) || ! empty( $s1_content ) ) : ?>
		<section class="section-1">
			<div class="<?php echo $container_class; ?>">
				<div class="content">
					<h2 class="title"><?php echo $s1_title; ?></h2>
					<div class="text">
						<?php echo $s1_content; ?>
					</div>
				</div>
				<?php if ( ! empty( $s1_aside_content ) ) : ?>
					<div class="aside">
						<h2 class="aside-title"><?php echo $s1_aside_title; ?></h2>
						<div class="aside-text">
							<?php echo $s1_aside_content; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<section class="section-values col-1 home-values">
		<h2 class="home-values__title"><?php echo $title; ?></h2>
		<div class="home-values__content"><?php echo $content; ?></div>
		<div class="home-values__rows grid-col-4">
			<?php
			if ( have_rows( 's2_values' ) ) :
				while ( have_rows( 's2_values' ) ) :
					the_row();
					$icon          = get_sub_field( 'icon' );
					$value_title   = get_sub_field( 'title' );
					$value_content = get_sub_field( 'content' );
					$value_link    = get_sub_field( 'link' );
					?>

					<div class="value">
						<?php echo $icon; ?>
						<h3 class="value-title"><?php echo $value_title; ?></h3>
						<div class="value-content"><?php echo $value_content; ?></div>
					</div>

					<?php
				endwhile;
			endif;
			?>
		</div>
	</section>

	<section class="section-2">
		<div class="alternating">
			<?php
			$title   = get_field( 'c_title' );
			$content = get_field( 'c_content' );
			$aside   = get_field( 'c_aside' );
			?>
			<div class="alt-container">
				<div class="content">
					<h2 class="title"><?php echo $title; ?></h2>
					<div class="text">
						<?php echo $content; ?>
					</div>
				</div>
				<div class="aside">
					<div class="text">
						<?php echo $aside; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</article>
