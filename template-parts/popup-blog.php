<?php
$logo = get_field('popup_logo', 'options');
$title = get_field('popup_title', 'options');
$content = get_field('popup_content', 'options');

// Check for referrer
$refferer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
$allowed_hosts = ['localhost', 'ogorek.com'];
$host = parse_url($refferer, PHP_URL_HOST);
$from_internal_site = in_array($host, $allowed_hosts);

// Show popup based on referrer
$classnames = "popup";

$from_internal_site !== true ? $classnames .= " exit" : null;

?>

<?php if ($from_internal_site !== true) : ?>
    <section class="<?= $classnames ?>">
        <div class="inner-popup large-wrapper">
            <div class="close">X</div>
            <img src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>" class="popup-logo">
            <h2 class="popup-title"><?= $title ?></h2>
            <div class="popup-content">
                <?= $content ?>
            </div>
        </div>
    </section>
<?php endif; ?>