<?php

global $wp;
$atts = get_field('attorneys', 'user_' . get_current_user_id());

if (isset($_GET['attorney'])) {
    $chosen_attorney = $_GET['attorney'];
    $count = 0;
    $index_to_remove;
    if (isset($_GET['created'])) {
        foreach (get_field('trusts', $chosen_attorney) as $index => $current_trust) {
            if ($current_trust['group_title'] == $_GET['created']) {
                $count++;
                $index_to_remove = $index;
            }
        }
        if ($count > 1) {
            delete_row('trusts', $index_to_remove, $chosen_attorney);
        }
    }
}
if (isset($_GET['trust'])) {
    $chosen_trust = $_GET['trust'];
}
if (isset($_GET['create'])) {
    addNewRow($_GET['attorney']);
}

if (!empty($atts)) :
?>

    <article class="authenticated-view large-wrapper">
        <?php global $current_user;
        wp_get_current_user(); ?>
        <a class="logout-btn" href="<?= wp_logout_url(home_url($wp->request)) ?>">Logout</a>
        <h2 class="admin-name">Hello, <?= $current_user->nickname; ?></h2>
        <section class="attorney">
            <form action="" method="get">
                <label for="attorney">Client</label>
                <select class="attorney-select" onchange="this.form.submit();" name="attorney">
                    <?php if (!empty($chosen_attorney)) { ?>
                        <option value="<?= $chosen_attorney ?>"><?= get_the_title($chosen_attorney) ?></option>
                        <?php foreach ($atts as $att) { ?>
                            <?php if ($att->ID == $chosen_attorney) {
                            } else { ?>
                                <option value="<?= $att->ID ?>"><?= $att->post_title ?></option>
                            <?php } ?>
                        <?php } ?>
                    <?php } else { ?>
                        <option value="">Please select an attorney</option>
                        <?php foreach ($atts as $att) { ?>
                            <option value="<?= $att->ID ?>"><?= $att->post_title ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </form>
        </section>

        <?php if (!empty($chosen_attorney) && get_field('trusts', $chosen_attorney)) :  $trusts = get_field('trusts', $chosen_attorney); ?>
            <section class="trusts-selector">
                <form action="" method="get">
                    <label for="trusts">Trusts</label>
                    <select name="trusts" id="trusts">
                        <?php if (isset($_GET['trust'])) : ?>
                            <option value="<?= $chosen_trust ?>" id="trust-<?= $chosen_trust ?>"><?= $trusts[$chosen_trust]['group_title'] ?></option>
                            <?php foreach ($trusts as $index => $trust) : ?>
                                <?php if ($index == $chosen_trust) {
                                } else { ?>
                                    <option value="<?= $index ?>" id="trust-<?= $index ?>"><?= $trust['group_title'] ?></option>
                                <?php } ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <option value=""></option>
                            <?php foreach ($trusts as $index => $trust) : ?>
                                <option value="<?= $index ?>" id="trust-<?= $index ?>"><?= $trust['group_title'] ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </form>
                <div class="trust-chosen">
                    <div class="form-group">
                        <p class="alert-error">Cannot create a duplicate form with that name. Please enter a new name.</p>
                        <label for="trustTitle">Trust Name</label>
                        <input id="trustTitle" type="text" name="create" value="<?php if (isset($_GET['trust'])) echo $trusts[$chosen_trust]['group_title']; ?>">
                        <div class="btn-group">
                            <input type="submit" value="Save As New" id="addTrust">
                            <input type="submit" value="Update" id="updateField">
                        </div>
                    </div>
                </div>
            </section>

            <?php if (isset($_GET['trust'])) : ?>
                <section class="trusts">
                    <?php
                    $forms = get_field('trusts', $chosen_attorney)[$chosen_trust]['forms'];
                    if (!empty($forms)) : foreach ($forms as $form) :
                    ?>
                            <div class="form">
                                <h2 class="form-title"><?= $form['form_title'] ?></h2>
                                <a href="<?= $form['form_url'] ?>" class="btn <?= $form['is_complete'] ? 'completed' : '' ?>" target="_blank">View Form</a>
                            </div>
                    <?php endforeach;
                    endif; ?>

                </section>
            <?php endif; ?>
        <?php endif; ?>


    </article>

<?php endif; ?>

<?php
if (isset($_GET['title'])) {
    $newTitle = $_GET['title'];

    if (have_rows('trusts', $chosen_attorney)) : while (have_rows('trusts', $chosen_attorney)) : the_row();
            if (get_row_index() == $chosen_trust) {
                update_sub_field('group_title', $newTitle);
            }
        endwhile;
    endif;

    return;
}

function addNewRow($chosen_attorney)
{
    static $formTitle;
    $formTitle = $_GET['create'];

    $row = array(
        'group_title' => $formTitle,
        'forms' => array(
            array(
                'field_5e3b6e64bf55e' => "Trust Information",
                'field_5e3b6e6abf55f' => '',
            ),
        )
    );

    add_row('trusts', $row, $chosen_attorney);
    return;
}
