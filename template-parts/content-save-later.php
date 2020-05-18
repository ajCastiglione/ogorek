<?php

if ($_POST['post-link']) {

    $email = $_POST['email'];
    $post = $_POST['post-link'];
    $post_title = $_POST['post-title'];
    $subject = get_field('email_subject', 'options');
    $from_email = get_field('from_email', 'options');
    $from_name = get_field('from_name', 'options');
    $email_body = get_field('email_body', 'options');
    $headers = array(
        "From: {$from_name} <{$from_email}>",
        "MIME-Version: 1.0",
        "Content-type: text/html; charset=UTF-8'"
    );
    $msg = "{$email_body} <p>Here is the link to the article: <a href='{$post}'>{$post_title}.</a></p>";
    $sentEmail = wp_mail(
        $email,
        $subject,
        $msg,
        $headers
    );
    if ($sentEmail) : ?>
        <script>
            window.location.href = window.location.href + '?success=1';
        </script>
    <?php endif;
} else {
    ?>

    <section class="save-for-later">
        <?php if ($_GET['success']) : ?>
            <div class="alert alert-success">
                Successfully sent an email with the link to read the article later!
            </div>
        <?php else :  ?>
            <h3 class="sfl-title">Please enter your email to have this blog sent to you!</h3>
            <form action="" method="POST">
                <input type="email" name="email" id="email" placeholder="Email..." required>
                <input type="hidden" name="post-link" value="https:<?= get_permalink() ?>">
                <input type="hidden" name="post-title" value="<?= get_the_title($post->ID) ?>">
                <input type="submit" value="Save for later">
            </form>
    </section>
<?php endif;
    } ?>