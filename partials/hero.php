<?php
$hero = get_post_type() !== 'team' ? get_field('image') : null;

if (!is_home() && !is_category()) {
  $hero_title = get_field('title');
} else if (is_home()) {
  $hero_title = get_field('title', get_option('page_for_posts'));
  $hero = get_field('image', get_option('page_for_posts'));
  $hero_selection = get_field('hero_selector', get_option('page_for_posts'));
} else if (is_category()) {
  $hero_title = single_cat_title('', false);
}

$hero_content = get_field('hero_content');

if (is_page(460)) {
  $hero_gallery = get_field('images');
  $hero_title = get_field('custom_hero_title');
  $content = get_field('content');
}

?>

<?php if (get_post_type($post->ID) == 'firms') : ?>
  <div class="hero <?php echo $hero ? '' : 'no-image law-firm-hero' ?>" style="background-image:url(<?= $hero['url'] ?>)">
    <?php $ogorek_logo = get_field('ogorek_company_logo', 'options'); ?>
    <div class="split-logo">
      <img src="<?= $ogorek_logo['url'] ?>" alt="Ogorek Wealth Management" class="logo">
      <?= !empty(get_field('law_firm_logo')) ? "<span class=\"divider\"></span><img class=\"firm-logo\" src=" . get_field('law_firm_logo')['url'] . ">" : "<h1 class=\"title\">" . get_the_title() . "</h1>" ?>
    </div>
  </div>

<?php elseif (get_field('hero_selector') == 'unique' || (is_home() && $hero_selection == 'unique')) : $logo = get_field('logo')['url'] ?: 'https://ogorek.com/wp-content/uploads/2020/04/OGOREK-Logo-White-01.png'; ?>
  <div class="hero three-part" style="background-image:url(<?= $hero['url'] ?: 'https://ogorek.com/wp-content/uploads/2020/04/new-bg-higher-point.png' ?>)">
    <h1 class="title"><?php echo $hero_title ? $hero_title : get_the_title(); ?></h1>
    <?php if (!empty($logo)) : ?>
      <div class="logo">
        <a href="<?= site_url('/') ?>">
          <img src="<?= $logo; ?>" alt="Ogorek wealth management">
        </a>
      </div>
    <?php endif; ?>
  </div>

<?php elseif (!is_page(460)) : ?>
  <div class="hero <?php echo $hero ? '' : 'no-image' ?>" style="background-image:url(<?= $hero['url'] ?>)">
    <h1 class="title"><?php echo $hero_title ? $hero_title : get_the_title(); ?></h1>
    <?php if (!empty($hero_content)) : ?>
      <div class="text">
        <?= $hero_content; ?>
      </div>
    <?php endif; ?>
  </div>

<?php else : ?>
  <div class="hero-large">
    <div class="grid-col-3">
      <?php foreach ($hero_gallery as $image) : ?>
        <div class="img-container">
          <img src="<?= $image['url'] ?>" alt="" class="hero-imgs">
        </div>
      <?php endforeach; ?>
    </div>
    <h1 class="title"><?= $hero_title ?></h1>
    <div class="text">
      <?= $content ?>
    </div>
  </div>
<?php endif; ?>