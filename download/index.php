<?php

require_once $_SERVER['DOCUMENT_ROOT']."/include/helpers.inc.php";

$pageTitle = "Download the Gantabya app";
$pageId = "download";

include "$ROOT/templates/header.html.php";
include "$ROOT/download/download.html.php";
include "$ROOT/templates/footer.html.php";

exit();