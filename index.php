<?php

include_once("classes.php");
include_once("xPaths.php");

$cities = []; $clubs = []; $logs = []; $skiers = [];

// Connect to database
$pdo = new PDO('mysql:host=127.0.0.1;dbname=db_oblig5;charset=utf8mb4', 'root', 'root');

const $xml = simplexml_load_file('SkierLogs.xml');

$xml_cities = $XML->xpath(
  '//SkierLogs/Clubs/Club'
);


foreach($CITIES as $city) {
  array_push($cities, new City($city));
}

echo '<pre>';
print_r($cities);
