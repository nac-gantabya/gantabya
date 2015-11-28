<?php

// get the helpers
require_once $_SERVER['DOCUMENT_ROOT'].'/include/helpers.inc.php';

try {
    // connect to db
    require "$ROOT/include/db.inc.php";
    
    // get the list of tickets
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
            ' BusAgencies.Phone AS APhone,' .
            ' BusAgencies.Website AS AWebsite' .
            ' FROM BusTickets' .
            ' INNER JOIN BusAgencies ON BusTickets.AgencyId=BusAgencies.Id';
    
    $result = $DB->query($query);
    $tickets = $result->fetchAll();
    
    // set page variables
    $pageTitle = "Bus Tickets";
    $pageId = "bus";
    
    // include the view
    include "$ROOT/templates/header.html.php";
    include "bus_tickets.html.php";
    include "$ROOT/templates/footer.html.php";
} catch (PDOException $e) {
    die("SERVER ERROR: " . $e->getMessage());
}