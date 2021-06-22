<?php
$logo = get_field('logo')['url'];
$img_or_vid = get_field('image_or_video');
$hero = $img_or_vid == 'image' ? get_field('hero_image')['url'] : get_field('hero_video');
$hero_vid_content = get_field('hero_left_content');
$hero_img_content = get_field('hero_content');
$formID = get_field('contact_form');
$form = do_shortcode("[gravityform id='{$formID}' title='false' description='false']");
$title = get_field('above_form_title');
$subtitle = get_field('above_form_subtitle');
$formTitle = get_field('form_title');
$formSubtitle = get_field('form_subtitle');

$sectClassNames = 'hero-landing-page ';
$sectClassNames .= $img_or_vid == 'image' ? 'has-img' : 'has-video';
?>

<section class="<?= $sectClassNames ?>">
    <div class="grid-50">
        <div class="left">
            <img src="<?= $logo ?>" alt="Ogorek Wealth Management" class="logo">
            <?php if ($img_or_vid == 'image') : ?>
                <img src="<?= $hero ?>" alt="Ogorek Wealth Management" class='landing-page__bg'>
            <?php else : ?>
                <video controls playsinline preload="metadata" class="landing__vid">
                    <source src="<?= $hero ?>">
                </video>
            <?php endif; ?>
            <?php if ($img_or_vid !== 'image') : ?>
                <div class="content">
                    <?= $hero_vid_content ?>
                </div>
            <?php endif; ?>
            <?php if ($img_or_vid !== 'vid' && !empty($hero_img_content)) : ?>
                <div class="content img-content">
                    <?= $hero_img_content ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="right">
            <h1 class="title"><?= $title ?></h1>
            <p class="subtitle"><?= $subtitle ?></p>
            <div class="popup-container">
                <div class="form">
                    <h2 class="form-title"><?= $formTitle ?></h2>
                    <h3 class="form-subtitle"><?= $formSubtitle ?></h3>
                    <?= $form ?>
                </div>
                <div class="cta-buttons">
                    <a href="tel:716-626-5000" class="cta"><i class="fas fa-phone-alt" aria-hidden="true"></i> 716-626-5000</a>
                    <span class="or">or</span>
                    <a href="mailto:prosper@ogorek.test" class="cta"><i class="fas fa-paper-plane" aria-hidden="true"></i> Contact Us</a>
                </div>
            </div>
            <a href="<?= $img_or_vid === 'image' ? '#section-1' : '#section-2'; ?>" class="learn-more">learn more <svg class="down-arrow" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                    <path d="M23.245 4l-11.245 14.374-11.219-14.374-.781.619 12 15.381 12-15.391-.755-.609z" />
                </svg></a>
        </div>
    </div>
</section>