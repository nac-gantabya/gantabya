<?php /** This is the controller of the download sub-domain */

require_once $_SERVER['DOCUMENT_ROOT']."/include/helpers.inc.php";

$pageTitle = "Contact Us";
$pageId = "contact";

include "$ROOT/templates/header.html.php";
include "$ROOT/contact/contact.html.php";
include "$ROOT/templates/footer.html.php";