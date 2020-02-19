<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->

<head>
	<meta charset="utf-8">

	<?php // force Internet Explorer to use the latest rendering engine available 
	?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>
		<?php wp_title(''); ?>
	</title>

	<?php // mobile meta (hooray!) 
	?>
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/)
	$siteUrl = site_url();
	?>
	<link rel="apple-touch-icon" sizes="76x76" href="<?= $siteUrl ?>/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= $siteUrl ?>/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= $siteUrl ?>/favicon-16x16.png">
	<link rel="manifest" href="<?= $siteUrl ?>/site.webmanifest">
	<link rel="mask-icon" href="<?= $siteUrl ?>/safari-pinned-tab.svg" color="#5bbad5">
	<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="theme-color" content="#ffffff">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<!--external stylesheets / fonts / etc...-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<!-- Owl slider bc slick broke randomly... again-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
	<?php // wordpress head functions 
	?>
	<?php wp_head(); ?>
	<?php // end of wordpress head 
	?>

	<?php // drop Google Analytics Here 
	?>
	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-TRVGDQV');
	</script>
	<!-- End Google Tag Manager -->
	<!-- Hotjar Tracking Code for ogorek.com -->
	<script>
		(function(h, o, t, j, a, r) {
			h.hj = h.hj || function() {
				(h.hj.q = h.hj.q || []).push(arguments)
			};
			h._hjSettings = {
				hjid: 1613502,
				hjsv: 6
			};
			a = o.getElementsByTagName('head')[0];
			r = o.createElement('script');
			r.async = 1;
			r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
			a.appendChild(r);
		})(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
	</script>
	<?php // end analytics 
	?>

</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TRVGDQV" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<div id="container">

		<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

			<div class="search-field">
				<?= get_search_form(); ?>
			</div>

			<div id="inner-header" class="cf">

				<div class="top-header">
					<div class="grid-50">
						<div class="info">
							<a href="tel:+<?= trim(get_field('phone_number', 'options')); ?>">
								<i class="fas fa-phone"></i> <?= trim(get_field('phone_number', 'options')); ?>
							</a>
							<a href="mailto:<?= trim(get_field('email_address', 'options')); ?>">
								<i class="fas fa-envelope"></i> <?= is_page(3595) ? 'trust@ogorek.com' : trim(get_field('email_address', 'options')); ?>
							</a>
						</div>
						<div class="socials">
							<?php if (have_rows('social_media', 'options')) : while (have_rows('social_media', 'options')) : the_row(); ?>
									<a href="<?= get_sub_field('social_url'); ?>" target="_blank" rel="noopener noreferrer" class="social-icon">
										<?= get_sub_field('social_icon'); ?>
									</a>
							<?php endwhile;
							endif; ?>
						</div>
					</div>
				</div>

				<div class="header-bottom grid-3070">
					<div class="header-left">
						<a href="<?= home_url(); ?>">
							<img src="<?= get_field('logo', 'options')['url']; ?>" id="logo" class="h1" itemscope itemtype="http://schema.org/Organization">
						</a>
					</div>

					<div class="header-right">
						<nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
							<?php wp_nav_menu(array(
								'container' => false,                           // remove nav container
								'container_class' => 'menu cf',                 // class of container (should you choose to use it)
								'menu' => __('The Main Menu', 'bonestheme'),  // nav name
								'menu_class' => 'nav top-nav cf',               // adding custom nav class
								'theme_location' => 'main-nav',                 // where it's located in the theme
								'before' => '',                                 // before the menu
								'after' => '',                                  // after the menu
								'link_before' => '',                            // before each link
								'link_after' => '',                             // after each link
								'depth' => 0,                                   // limit the depth of the nav
								'fallback_cb' => 'bones_main_nav_fallback'      // fallback function (if there is one)
							)); ?>
						</nav>
					</div>
				</div>

			</div>

		</header>