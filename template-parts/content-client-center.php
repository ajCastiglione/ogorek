<section class="entry-content col-1 cf" itemprop="articleBody">

  <div class="hotlinks hotlinks-trust-solution">
    <?php if (have_rows('top_section')) : while (have_rows('top_section')) : the_row(); ?>
        <div class="hotlink">
          <a href="<?= get_sub_field('link') ?>" class="link">
            <span><?= get_sub_field('title') ?></span>
            <img src="<?= get_sub_field('image')['url'] ?>" alt="Icon" class="icon">
          </a>
        </div>
    <?php endwhile;
    endif; ?>
  </div>

  <div class="client-information">
    <h2 class="section-title"><?= get_field('section_title') ?></h2>

    <div class="grid">
      <?php if (have_rows('client_section')) : while (have_rows('client_section')) : the_row(); ?>
          <div class="info">
            <a href="<?= get_sub_field('link') ?>" class="link">
              <img src="<?= get_sub_field('image')['url'] ?>" alt="Icon" class="icon">
              <span><?= get_sub_field('title') ?></span>
            </a>
          </div>
      <?php endwhile;
      endif; ?>
    </div>

  </div>

  <?php the_content(); ?>

</section>

<div class="app-locations">

  <h2 class="sub-title"><?= get_field('app_title') ?></h2>
  <?php if (have_rows('store_locations')) : while (have_rows('store_locations')) : the_row(); ?>
      <div class="app-dl">
        <a href="<?= get_sub_field('link') ?>" target="_blank" rel="noopener noreferrer"><img src="<?= get_sub_field('image')['url']; ?>" alt="App Location"></a>
      </div>
  <?php endwhile;

  endif; ?>
</div>