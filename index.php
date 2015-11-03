<?php

// include helper
require_once $_SERVER['DOCUMENT_ROOT'] . "/include/helpers.inc.php";

//================= IF USER SUBMITTED THE Company FORM, ADD TO DATABASE
// TODO
//================= IF USER SUBMITTED THE Package FORM, ADD TO DATABASE
// TODO
//================= if user click on 'Add Company' button, show a company form
// TODO
//================= IF USER CLICK THE 'Add Package' BUTTON, show package form

if (isset($_GET['add_package'])) {
    // get the list of companies and types
    require_once "$ROOT/include/db.inc.php";
    try {
        $result = $DB->query("SELECT * FROM Companies ORDER BY Name");
        $companies = $result->fetchAll();
        $result = $DB->query("SELECT * FROM Types ORDER BY Name");
        $types = $result->fetchAll();

        $pageTitle = "Add a Package";
        $pageId = "add_package";
        include "$ROOT/templates/header.html.php";
        include "$ROOT/package_form.html.php";
        include "$ROOT/templates/footer.html.php";
    } catch (PDOException $e) {
        $error = "Cannot extract list of companies: " . $e->getMessage();
        include "$ROOT/templates/error.html.php";
    }

    exit();
}

//======================== IF NOTHING SPECIFIED, SHOW THE LIST OF PACKAGES
// connect to database
require_once "$ROOT/include/db.inc.php";

// get data
try {
    $queryString = "SELECT" .
            " Packages.Id AS PackageId," .
            " Packages.Name AS PackageName," .
            " Description, Detail," .
            " Companies.Name AS CompanyName" .
            " FROM Packages" .
            " INNER JOIN Companies" .
            " ON Packages.CompanyId = Companies.Id" .
            " ORDER BY Packages.Name";
    $result = $DB->query($queryString);
    // get the array of packages
    $packages = $result->fetchAll();

    $pageTitle = "Gantabya";
    $pageId = "home";
    include "$ROOT/templates/header.html.php";
    include "$ROOT/homepage.html.php";
    include "$ROOT/templates/footer.html.php";
} catch (PDOException $e) {
    $error = "Cannot extract data: " . $e->getMessage();
    include "$ROOT/templates/error.html.php";
}

exit();
