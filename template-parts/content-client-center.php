<?php
/**
 * Content partial for content center
 *
 * @package minervawebdevelopment
 */

?>

<section class="entry-content col-1 cf" itemprop="articleBody">

	<div class="hotlinks hotlinks-trust-solution">
		<?php
		if ( have_rows( 'top_section' ) ) :
			while ( have_rows( 'top_section' ) ) :
				the_row();
				?>
				<div class="hotlink">
					<a href="<?php echo esc_url( get_sub_field( 'link' ) ); ?>" class="link">
						<?php if ( get_sub_field( 'title' ) ) : ?>
							<span><?php echo esc_html( get_sub_field( 'title' ) ); ?></span>
						<?php endif; ?>
						<img src="<?php echo esc_url( get_sub_field( 'image' )['url'] ); ?>" alt="Icon" class="icon<?php echo get_sub_field( 'title' ) ? null : ' no-title'; ?>">
					</a>
				</div>
				<?php
			endwhile;
		endif;
		?>
	</div>

	<div class="center lone-cta">
		<a href="<?php echo esc_url( get_site_url() ); ?>/schedule-an-appointment/" class="btn">Schedule an appointment</a>
	</div>
	<div class="client-information">
		<h2 class="section-title"><?php echo esc_html( get_field( 'section_title' ) ); ?></h2>

		<div class="grid">
			<?php
			if ( have_rows( 'client_section' ) ) :
				while ( have_rows( 'client_section' ) ) :
					the_row();
					?>
					<div class="info">
						<a href="<?php echo esc_url( get_sub_field( 'link' ) ); ?>" class="link">
							<img src="<?php echo esc_url( get_sub_field( 'image' )['url'] ); ?>" alt="Icon" class="icon">
							<span><?php echo wp_kses_post( get_sub_field( 'title' ) ); ?></span>
						</a>

						<?php
						if ( ! empty( get_sub_field( 'app_links' ) ) ) :
							$links = get_sub_field( 'app_links' );
							echo '<div class="app-dl">';
							foreach ( $links as $download ) :
								?>
									<a href="<?php echo esc_url( $download['app_link'] ); ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo esc_url( $download['app_image'] ); ?>" alt="App Location"></a>
								<?php
							endforeach;
							echo '</div>';
						endif;
						?>
					</div>
					<?php
				endwhile;
			endif;
			?>
		</div>

	</div>

	<?php the_content(); ?>

</section>
<?php /*
<div class="app-locations">

	<h2 class="sub-title"><?php echo esc_html( get_field( 'app_title' ) ); ?></h2>
	<?php
	if ( have_rows( 'store_locations' ) ) :
		while ( have_rows( 'store_locations' ) ) :
			the_row();
			?>
			<div class="app-dl">
				<a href="<?php echo esc_url( get_sub_field( 'link' ) ); ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo esc_url( get_sub_field( 'image' )['url'] ); ?>" alt="App Location"></a>
			</div>
			<?php
		endwhile;

	endif;
	?>
</div>
*/ ?>
