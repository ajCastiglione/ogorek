<section class="services large-wrapper">
    <?php if (have_rows('service_offerings')) : while (have_rows('service_offerings')) : the_row();
            $img = get_sub_field('image');
            $link = get_sub_field('link');
    ?>

            <a <?php if (!empty($link)) : ?> href="<?= $link ?>" <?php endif; ?>>
                <img src="<?= $img['url'] ?>" alt="<?= $img['alt'] ?>">
            </a>

    <?php endwhile;
    endif; ?>
</section>