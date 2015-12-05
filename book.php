<?php

// include the helpers
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/helpers.inc.php';

//====================================== SUBMIT-BOOK-FORM

if (isset($_POST['action']) && $_POST['action'] == 'submit-book-form') {
    // get form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $passport = trim($_POST['passport']);
    
    // show thank you page
    $pageTitle = "Thank you for booking";
    include "$ROOT/templates/header.html.php";
    include "book_thank.html.php";
    include "$ROOT/templates/footer.html.php";
    exit();
}

// include the form
$pageTitle = 'Book a package';
$pageId = 'book-package';
include "$ROOT/templates/header.html.php";
include 'book_form.html.php';
include "$ROOT/templates/footer.html.php";

exit();