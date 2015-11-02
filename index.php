<?php
$ROOT = $_SERVER['DOCUMENT_ROOT']."/gantabya";

// connect to database
require_once "include/db.inc.php";

// get data
try {
    $queryString = "SELECT Packages.Id AS PackageId, Packages.Name AS PackageName, Description, Detail, Companies.Name AS CompanyName ".
            "FROM Packages, Companies ".
            "WHERE Packages.CompanyId = Companies.Id";
    $result = $DB->query($queryString);
} catch (PDOException $e) {
    $error = "Cannot extract data: " . $e->getMessage();
    include "$ROOT/templates/error.html.php";
    exit();
}

while ($row = $result->fetch()) {
    $packages[] = $row;
}

$pageTitle = "Gantabya | Home";
$pageId = "home";
include "templates/header.html.php";
include "homepage.html.php";
include "templates/footer.html.php";
