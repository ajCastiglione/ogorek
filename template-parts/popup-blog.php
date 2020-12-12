<?php
$logo = get_field('popup_logo', 'options');
$title = get_field('popup_title', 'options');
$content = get_field('popup_content', 'options');

// Check for referrer
$allowed_hosts = ['localhost', 'ogorek.com'];
$host = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
$from_internal_site = in_array($host, $allowed_hosts);

// Show popup based on referrer
$classnames = "popup exit";
?>

<?php if ($from_internal_site) : ?>
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