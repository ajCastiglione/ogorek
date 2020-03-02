<?php

if (isset($_GET['login'])) {
    $error = true;
}

echo $error ? '<p class="alert-error">Error signing in, please try again.</p>' : null;

echo "<div class='secured-login'>";
wp_login_form(array('remember' => false));
echo "</div>";
