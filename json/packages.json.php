<?php

echo '{"GantabyaData":';

foreach ($data as $p) {
    $id = $p['id'];
    $name = $p['name'];
    $place = $p['place'];
    
    echo '{"id":"' . $id . '", "name":"' . $name . '", "place":"' . $place . '"},';
}

echo '}';