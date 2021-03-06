<?php get_header(); ?>

<div id="content" class="blog">

	<div id="inner-content" class="cf">

		<main id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<!-- Hero -->
			<?= get_template_part('partials/hero'); ?>

			<!-- Header -->
			<header class="blog-header">
				<h1 class="title">Blogs</h1>
				<?= get_search_form(); ?>
			</header>

			<!-- Categories -->
			<div class="categories col-1">
				<div class="category">
					<a href="<?= site_url() . '/blog' ?>" class="link <?= is_home() || is_page(1296) ? 'active' : ''; ?>">
						<i class="far fa-circle"></i>
						<h3 class="cat-title">All</h3>
					</a>
				</div>
				<?php
				$id = $post->ID === 650 ? 14 : 15;
				$cats = get_categories(array(
					'parent' => $id,
					'orderby' => 'menu_order'
				));
				$count = 0;
				foreach ($cats as $cat) {
					$icon = get_field('category_icon', $cat); ?>
					<div class="category">
						<a href="<?= site_url() . '/blog/' . $cat->slug ?>" class="link <?php if ($cat->slug === $post->post_name && !is_home()) echo 'active'; ?>">
							<?= $icon ?>
							<h3 class="cat-title"><?= $cat->name ?></h3>
						</a>
					</div>
				<?php } ?>
			</div>

			<!-- Content for blog page -->

			<?= get_template_part('template-parts/archive', 'cat'); ?>

			<?php bones_page_navi(); ?>

		</main>

	</div>

</div>


<?php get_footer(); ?>