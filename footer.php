<?php $title = get_field('footer_title', 'options');
$addr = get_field('address', 'options');
$phone = get_field('phone_number', 'options');
$email = get_field('email_address', 'options');
$logos = get_field('footer_logos', 'options');
$disclosures = get_field('disclosures', 'options'); ?>
<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

	<?= get_template_part('template-parts/footer', 'newsletter') ?>

	<div id="inner-footer" class="cf col-1">

		<div class="content">
			<h2 class="title"><?= $title; ?></h2>
			<address class="address">
				<?= $addr; ?>
			</address>

			<div class="socials">
				<?php if (have_rows('social_media', 'options')) : while (have_rows('social_media', 'options')) : the_row(); ?>
						<a href="<?= get_sub_field('social_url'); ?>" target="_blank" rel="noopener noreferrer" class="social-icon">
							<?= (get_sub_field('icon_or_svg')) ? get_sub_field('social_icon') : '<figure>' . get_sub_field('social_icon_svg') . '</figure>'; ?>
						</a>
				<?php endwhile;
				endif; ?>
			</div>
			<img src="<?= $logos['url']; ?>" alt="Logos" class="logos">
			<div class="disclosures">
				<?= $disclosures; ?>
			</div>
			<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.</p>
		</div>

	</div>

</footer>

</div>

<?php // all js scripts are loaded in library/bones.php 
?>
<?php wp_footer(); ?>

<!-- Owl Carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

</body>

</html> <!-- end of site. what a ride! -->