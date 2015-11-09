<?php

// get helpers
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/helpers.inc.php';

try {
    // connect to database
    require "$ROOT/include/db.inc.php";

    $query = 'SELECT' .
            ' Packages.Id AS PackageId,' .
            ' Packages.Name AS PackageName,' .
            ' Packages.Place AS PackagePlace,' .
            ' Packages.Description AS PackageDescription,' .
            ' Packages.Duration AS PackageDuration,' .
            ' Packages.Price AS PackagePrice,' .
            ' Packages.Detail AS PackageDetail,' .
            ' Packages.Image AS PackageImage,' .
            ' Packages.CompanyId AS CompanyId,' .
            ' Companies.Name AS CompanyName,' .
            ' Companies.Website AS CompanyWebsite' .
            ' FROM Packages' .
            ' INNER JOIN Companies ON Packages.CompanyId=Companies.Id';
    
    $result = $DB->query($query);
    $packages = $result->fetchAll();
    
    // include the xml template
    header('Content-Type: text/xml');
    include "$ROOT/data.xml.php";
} catch (PDOException $e) {
    echo "SERVER ERROR: " . $e->getMessage();
}