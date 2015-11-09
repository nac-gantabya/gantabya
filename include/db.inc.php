<?php

$hostname = "gantabya";
$dbname = "gantabya";
$dbuser = "gantabya";
$dbpassword = "gantabya";

try {
    $DB = new PDO('mysql:host='.$hostname.';dbname='.$dbname, $dbuser, $dbpassword);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DB->exec("SET NAMES 'utf8'");
} catch (PDOException $e) {
    $error = "Cannot connect to database: " . $e->getMessage();
    include "$ROOT/templates/error.html.php";
    exit();
}
