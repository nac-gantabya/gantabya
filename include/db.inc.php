<?php

try {
    $DB = new PDO("sqlite:$ROOT/Gantabya.db");
} catch (PDOException $e) {
    $error = "Cannot connect to database: " . $e->getMessage();
    include "$ROOT/templates/error.html.php";
    exit();
}
