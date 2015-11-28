<?php

// get helpers
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/helpers.inc.php';

try {
    // connect to database
    require "$ROOT/include/db.inc.php";

    $query = 'SELECT' .
            ' Packages.Id AS PId,' .
            ' Packages.Name AS PName,' .
            ' Packages.Place AS PPlace,' .
            ' Packages.Description AS PDescription,' .
            ' Packages.Duration AS PDuration,' .
            ' Packages.Itinerary AS PItinerary,' .
            ' Packages.Season AS PSeason,' .
            ' Packages.Cost AS PCost,' .
            ' Packages.CostInclusion AS PCostInclusion,' .
            ' Packages.CostExclusion AS PCostExclusion,' .
            ' Packages.Detail AS PDetail,' .
            ' Packages.Image AS PImage,' .
            ' Packages.CompanyId AS CId,' .
            ' Companies.Name AS CName,' .
            ' Companies.Website AS CWebsite,' .
            ' Companies.Phone AS CPhone' .
            ' FROM Packages' .
            ' INNER JOIN Companies ON Packages.CompanyId=Companies.Id';
    
    $result = $DB->query($query);
    $packages = $result->fetchAll();
    
    // include the xml template
    header('Content-Type: text/xml');
    include "packages.xml.php";
} catch (PDOException $e) {
    echo "SERVER ERROR: " . $e->getMessage();
}