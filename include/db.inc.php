<?php

try {
    $DB = new PDO("sqlite:$ROOT/db/Gantabya.db");
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $error = "Cannot connect to database: " . $e->getMessage();
    include "$ROOT/templates/error.html.php";
    exit();
}
