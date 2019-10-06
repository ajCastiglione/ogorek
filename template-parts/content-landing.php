<section class="values">
  <div class="grid-col-3 col-1">
    <?php if (have_rows('values')) : while (have_rows('values')) : the_row(); ?>
        <?php $icon = get_sub_field('icon');
            $title = get_sub_field('title');
            $content = get_sub_field('content'); ?>
        <div class="item">
          <?= $icon ?>
          <h3 class="title"><?= $title ?></h3>
          <div class="content">
            <?= $content ?>
          </div>
        </div>
    <?php endwhile;
    endif; ?>
  </div>
</section>

<section class="page-content">
  <div class="grid-50 col-1">
    <?php $sTitle = get_field('content_title');
    $sContent = get_field('content');
    $aside = get_field('aside'); ?>
    <div class="content">
      <h2 class="title"><?= $sTitle ?></h2>
      <div class="text">
        <?= $sContent ?>
      </div>
    </div>
    <div class="aside">
      <div class="aside-text">
        <?= $aside ?>
      </div>
    </div>
  </div>
</section>