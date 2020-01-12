<?php
if (!post_password_required($post)) { ?>
    <section class="law-firm large-wrapper">
        <div class="grid">
            <?php if (have_rows('attorneys')) : while (have_rows('attorneys')) : the_row();
                    $attorney = get_sub_field('attorney'); ?>
                    <div class="attorney">
                        <h2 class="name"><?= $attorney->post_title ?></h2>
                        <p class="fields">Forms: <?= count(get_field('forms', $attorney->ID)) ?></p>
                        <a href="<?= the_permalink($attorney->ID) ?>" class="cta">View Attorney</a>
                    </div>
            <?php endwhile;
            endif; ?>
    </section>
<?php } else {
    // show password form here if not authenticated
    echo "<div class='secured-login large-wrapper'>";
    echo get_the_password_form();
    echo "</div>";
}
?>