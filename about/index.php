<?php /** This is the controller of the download sub-domain */

require_once $_SERVER['DOCUMENT_ROOT']."/include/helpers.inc.php";

$pageTitle = "About Us";
$pageId = "about";

include "$ROOT/templates/header.html.php";
include "$ROOT/about/about.html.php";
include "$ROOT/templates/footer.html.php";