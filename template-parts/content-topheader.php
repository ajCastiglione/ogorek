<?php if ( get_field( 'show_alert', 'options' ) ) : ?>

  <div class="alert__header">
	<a 
	<?php
	if ( get_field( 'alert_link', 'options' ) ) :
		?>
		 href="<?php echo get_field( 'alert_link', 'options' ); ?>" <?php endif; ?> class="alert__link">
	  <div class="alert__inner">
		<?php echo get_field( 'alert_icon', 'options' ) ?: null; ?>
		<p><?php echo get_field( 'alert_content', 'options' ) ?: null; ?></p>
	  </div>
	</a>
  </div>

<?php endif; ?>

<div class="top-header-grid">
  <div class="info">
	<a href="tel:<?php echo esc_html( trim( get_field( 'phone_number', 'options' ) ) ); ?>">
	  <i class="fas fa-phone"></i> <span><?php echo esc_html( trim( get_field( 'phone_number', 'options' ) ) ); ?></span>
	</a>
	<a href="mailto:<?php echo is_page( 3595 ) ? 'trust@ogorek.com' : esc_attr( trim( get_field( 'email_address', 'options' ) ) ); ?>">
	  <i class="fas fa-envelope"></i> <span><?php echo is_page( 3595 ) ? 'trust@ogorek.com' : esc_attr( trim( get_field( 'email_address', 'options' ) ) ); ?></span>
	</a>
  </div>

  <div class="header-message">
	<div class="text">
	  <?php
		if ( have_rows( 'header_ctas', 'options' ) ) :
			while ( have_rows( 'header_ctas', 'options' ) ) :
				the_row();
				?>
		  <a href="<?php echo esc_url( get_sub_field( 'cta_link' ) ); ?>"><?php echo esc_html( get_sub_field( 'cta_text' ) ); ?></a>
				  <?php
		endwhile;
	  endif;
		?>
	</div>
  </div>

  <!-- 
  <div class="socials">
	<?php
	/*
	 if (have_rows('social_media', 'options')) : while (have_rows('social_media', 'options')) : the_row(); ?>
		<a href="<?= get_sub_field('social_url'); ?>" target="_blank" rel="noopener noreferrer" class="social-icon">
		  <?= (get_sub_field('icon_or_svg')) ? get_sub_field('social_icon') : '<figure>' . get_sub_field('social_icon_svg') . '</figure>'; ?>
		</a>
	<?php endwhile;
	endif; */
	?>
  </div>
   -->
</div>

<?php
if ( get_field( 'show_banner', 'options' ) ) :
	?>
  <div class="header-banner">
	<div class="banner-content"><?php echo get_field( 'banner_content', 'options' ); ?></div>
  </div>
<?php endif; ?>
