<div class="alternating">
  <?php if (have_rows('alternating_content')) : while (have_rows('alternating_content')) : the_row(); ?>
      <?php
          $title = get_sub_field('title');
          $content = get_sub_field('content');
          $aside = get_sub_field('aside_content');
          ?>
      <div class="alt-container">
        <div class="content">
          <h2 class="title"><?= $title ?></h2>
          <div class="text">
            <?= $content ?>
          </div>
        </div>
        <div class="aside">
          <div class="text">
            <?= $aside ?>
          </div>
        </div>
      </div>

  <?php endwhile;
  endif; ?>
</div>