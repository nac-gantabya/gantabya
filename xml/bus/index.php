<?php

// get helpers
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/helpers.inc.php';

try {
    // connect to database
    require "$ROOT/include/db.inc.php";

    $query = 'SELECT' .
            ' BusTickets.Id AS BId,' .
            ' BusTickets.AgencyId AS AId,' .
            ' BusTickets.PlaceFrom AS BFrom,' .
            ' BusTickets.PlaceTo AS BTo,' .
            ' BusTickets.DepartureTime AS BDepartureTime,' .
            ' BusTickets.ArrivalTime AS BArrivalTime,' .
            ' BusTickets.Cost AS BCost,' .
            ' BusTickets.Image AS BImage,' .
            ' BusTickets.SeatChart AS BChart,' .
            ' BusTickets.Detail AS BDetail,' .
            ' BusAgencies.Name AS AName,' .
            ' BusAgencies.RegistrationNumber AS ANumber,' .
            ' BusAgencies.Phone AS APhone,' .
            ' BusAgencies.Website AS AWebsite' .
            ' FROM BusTickets' .
            ' INNER JOIN BusAgencies ON BusTickets.AgencyId=BusAgencies.Id';

    $result = $DB->query($query);
    $tickets = $result->fetchAll();

    // include the xml template
    header('Content-Type: text/xml');
    include "tickets.xml.php";
} catch (PDOException $e) {
    echo "SERVER ERROR: " . $e->getMessage();
}