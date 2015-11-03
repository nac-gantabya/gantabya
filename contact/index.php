<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/include/helpers.inc.php";

//===== handle contact form submission

if (isset($_POST['action']) && $_POST['action'] == 'submit_feedback') {

    $pageId = "thankyou";
    $pageTitle = "Thank You";

    include "$ROOT/templates/header.html.php";
    include "$ROOT/contact/thankyou.html.php";
    include "$ROOT/templates/footer.html.php";

    exit();
}

$pageTitle = "Contact Us";
$pageId = "contact";

include "$ROOT/templates/header.html.php";
include "$ROOT/contact/contact.html.php";
include "$ROOT/templates/footer.html.php";

exit();
