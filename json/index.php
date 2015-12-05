<?php

// include helpers
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/helpers.inc.php';

try {
    // connect to db
    require "$ROOT/include/db.inc.php";
    
    $sql = 'SELECT * FROM Packages';
    $result = $DB->query($sql);

    foreach ($result as $P) {
        $data[] = array('id' => $P['Id'], 'name' => $P['Name'], 'place' => $P['Place']);
    }
} catch (PDOException $e) {
    die("Cannot connect to database: " . $e->getMessage());
}

include 'packages.json.php';