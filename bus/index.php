<?php

// get the helpers
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/helpers.inc.php';


//=================================== ADD_AGENCY

if (isset($_GET['add_agency'])) {
    $pageTitle = "Add bus agency";
    $pageId = "add_agency";
    include "$ROOT/templates/header.html.php";
    include "agency_form.html.php";
    include "$ROOT/templates/footer.html.php";
    exit();
}

//=================================== SUBMIT_AGENCY

if (isset($_POST['action']) && $_POST['action'] == 'submit_agency') {
    try {
        // get form data
        $AName = trim($_POST['AName']);
        $ANumber = trim($_POST['ANumber']);
        $APhone = trim($_POST['APhone']);
        $AWebsite = trim($_POST['AWebsite']);
        $APassword = trim($_POST['APassword']);
        
        // insert into BusAgencies
        require "$ROOT/include/db.inc.php";
        $s = $DB->prepare("INSERT INTO BusAgencies VALUES ('', :name, :number, :phone, :website, :password)");
        $s->execute(array(
            ':name' => $AName,
            ':number' => $ANumber,
            ':phone' => $APhone,
            ':website' => $AWebsite,
            ':password' => $APassword
        ));
        
        redirect("$DOMAIN/bus/?add_ticket");
    } catch (PDOException $e) {
        die("SERVER ERROR: " . $e->getMessage());
    }
    exit();
}

//=================================== ADD_TICKET

if (isset($_GET['add_ticket'])) {
    try {
        // get list of agencies
        require "$ROOT/include/db.inc.php";
        $result = $DB->query('SELECT * FROM BusAgencies');
        $agencies = $result->fetchAll();

        // show the form
        $pageTitle = "Add bus ticket";
        $pageId = "add_ticket";
        include "$ROOT/templates/header.html.php";
        include "ticket_form.html.php";
        include "$ROOT/templates/footer.html.php";
    } catch (PDOException $e) {
        die("SERVER ERROR: " . $e->getMessage());
    }

    exit();
}


//==================================== SUBMIT_TICKET
else if (isset($_POST['action']) && $_POST['action'] == 'submit_ticket') {
    try {
        // get the form data
        $AId = $_POST['AId'];
        $BFrom = trim($_POST['BFrom']);
        $BTo = trim($_POST['BTo']);
        $BDepartureTime = trim($_POST['BDepartureTime']);
        $BArrivalTime = trim($_POST['BArrivalTime']);
        $BCost = trim($_POST['BCost']);
        $BImage = trim($_POST['BImage']);
        $BChart = trim($_POST['BChart']);
        $BWeekdays = $_POST['BWeekdays'];
        $BDetail = $_POST['BDetail'];
        $APassword = $_POST['APassword'];
        
        // check password
        require "$ROOT/include/db.inc.php";
        $result = $DB->query("SELECT Password FROM BusAgencies WHERE Id='$AId'");
        $row = $result->fetch();
        if ($APassword != $row['Password']) {
            die('Incorrect password! You bastard!');
        }
        
        /*// validate images
        if (getimagesize($BImage) <= 0) {
            die('Invalid image URL for ticket image. Go back and try again!');
        }
        if (!getimagesize($BChart) <= 0) {
            die('Invalid image URL for seat chart. Go back and try again!');
        }*/
        
        // insert into BusTickets
        require "$ROOT/include/db.inc.php";
        $q = "INSERT INTO BusTickets VALUES ('', :aid, :from, :to, :dtime, :atime, :cost, :img, :chart, :detail)";
        $s = $DB->prepare($q);
        $s->execute(array(
            ':aid' => $AId,
            ':from' => $BFrom,
            ':to' => $BTo,
            ':dtime' => $BDepartureTime,
            ':atime' => $BArrivalTime,
            ':cost' => $BCost,
            ':img' => $BImage,
            ':chart' => $BChart,
            ':detail' => $BDetail
        ));
        
        // insert into BusTicketWeekdays
        $BId = $DB->lastInsertId();
        $q = "INSERT INTO BusTicketWeekdays VALUES (:bid, :day)";
        $s = $DB->prepare($q);
        foreach ($BWeekdays as $weekday) {
            $s->execute(array(
                ':bid' => $BId,
                ':day' => $weekday
            ));
        }
        
        redirect(".");
    } catch (PDOException $e) {
        die("SERVER ERROR: " . $e->getMessage());
    }
    exit();
}

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