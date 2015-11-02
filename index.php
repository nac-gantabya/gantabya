<?php
// include helper
require_once $_SERVER['DOCUMENT_ROOT']."/include/helpers.inc.php";

// connect to database
require_once "$ROOT/include/db.inc.php";

// get data
try {
    $queryString =
            "SELECT".
            " Packages.Id AS PackageId,".
            " Packages.Name AS PackageName,".
            " Description, Detail,".
            " Companies.Name AS CompanyName".
            " FROM Packages".
            " INNER JOIN Companies".
            " ON Packages.CompanyId = Companies.Id".
            " ORDER BY Packages.Name";
    $result = $DB->query($queryString);
} catch (PDOException $e) {
    $error = "Cannot extract data: " . $e->getMessage();
    include "$ROOT/templates/error.html.php";
    exit();
}

// get the array of packages
$packages = $result->fetchAll();

$pageTitle = "Gantabya";
$pageId = "home";
include "$ROOT/templates/header.html.php";
include "$ROOT/homepage.html.php";
include "$ROOT/templates/footer.html.php";
