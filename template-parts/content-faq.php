<?php
$aside_title   = get_field( 'aside_title' );
$aside_content = get_field( 'aside_content' );
?>

<article class="service faqs">
  <?php echo get_template_part( 'partials/hero' ); ?>
  <section class="section-1">
	<div class="col-1 grid-50">

	  <div class="faqs">

		<?php
		if ( have_rows( 'faqs' ) ) :
			while ( have_rows( 'faqs' ) ) :
				the_row();
				$faq_title = get_sub_field( 'section_title' );
				$question  = get_sub_field( 'question' );
				$answer    = get_sub_field( 'answer' );
				?>
			<div class="faqs__content">
				<?php if ( ! empty( $faq_title ) ) : ?>
				<h2 class="faqs__section-title"><strong><?php echo esc_html( $faq_title ); ?></strong></h2>
			  <?php endif; ?>
			  <div class="text">
				<h4 class="faqs__question">
				  <span><?php echo esc_html( $question ); ?></span>
				  <span class="icon"><i class="fas fa-plus"></i></span>
				</h4>
				<div class="faqs__answer">
				  <?php echo wp_kses_post( $answer ); ?>
				</div>
			  </div>
			</div>

					<?php
		endwhile;
		endif;
		?>
	  </div>

	  <div class="aside">
		<?php if ( ! empty( $aside_title ) ) : ?>
		  <h2 class="aside-title"><?php echo esc_html( $aside_title ); ?></h2>
		<?php endif; ?>
		<div class="aside-text">
		  <?php echo $aside_content; ?>
		</div>
	  </div>
	</div>
  </section>
</article>
