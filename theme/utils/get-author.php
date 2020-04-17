<?php
function get_author($post)
{
    if (get_field('post_author')) {
        $post_author = get_the_title(get_field('post_author')[0]->ID);
    } elseif (get_the_author_meta('ID') !== 2 && get_the_author_meta('ID') !== 12) {
        $post_author = get_the_author_link(get_the_author_meta('ID', $post->ID));
    } else {
        $post_author = get_the_author_meta('display_name', 2);
    }

    $nn = get_the_author_meta('user_nicename', $post->ID);
    $found = false;

    $a = new WP_Query(array('post_type' => 'team'));
    $post_author_exists = !empty(get_field('post_author')) ? true : false;
    while ($a->have_posts()) : $a->the_post();
        $un = get_field('user_link')['user_nicename'];
        if ($un === $nn && !strstr($post_author, 'Team') && !$post_author_exists) {
            $found = true; ?>
            <div class="author-profile">
                <img src="<?= get_field('team_member_photo')['url'] ?>" alt="<?= the_title() ?>" class="portrait">
                <div class="info">
                    <h2 class="name"><?= the_title() ?></h2>
                    <a href="mailto:<?= get_field('email') ?>" class="email"><?= get_field('email') ?></a>
                </div>
            </div>
        <?php }
    endwhile;
    wp_reset_query();
    if (!$found && !empty(get_field('post_author'))) {
        $found = true;
        $authorID = get_field('post_author')[0]->ID; ?>
        <div class="author-profile">
            <img src="<?= get_field('team_member_photo', $authorID)['url'] ?>" alt="<?= the_title($authorID) ?>" class="portrait">
            <div class="info">
                <h2 class="name"><?= get_the_title($authorID) ?></h2>
                <a href="mailto:<?= get_field('email', $authorID) ?>" class="email"><?= get_field('email', $authorID) ?></a>
            </div>
        </div>
<?php }
}
