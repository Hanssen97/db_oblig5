<?php

include_once("classes.php");

// Connect to database
$pdo = new PDO('mysql:host=127.0.0.1;dbname=db_oblig5;charset=utf8mb4', 'root', 'root');

// Loading xml
$xml = simplexml_load_file('SkierLogs.xml');

// Parsing xml
//parseCities($xml);
//parseClubs($xml);
//parseSeasons($xml);
//parseSkiers($xml);
//parseLogs($xml);


//------------------------------------------------------------------------------
function parseCities($xml) {
  $parser = new City();
  $data = $xml->xpath('//SkierLogs/Clubs/Club');

  foreach($data as $city) {
    $parser->parse($city);
  }
}

//------------------------------------------------------------------------------
function parseClubs($xml) {
  $parser = new Club();
  $data = $xml->xpath('//SkierLogs/Clubs/Club');

  foreach($data as $club) {
    $parser->parse($club);
  }
}

//------------------------------------------------------------------------------
function parseSeasons($xml) {
  $parser = new Season();
  $data = $xml->xpath('//SkierLogs/Season');

  foreach($data as $season) {
    $parser->parse($season);
  }
}

//------------------------------------------------------------------------------
function parseSkiers($xml) {
  $parser = new Skier();
  $data = $xml->xpath('//SkierLogs/Skiers/Skier');

  foreach($data as $skier) {
    $parser->parse($skier);
  }
}

//------------------------------------------------------------------------------
function parseLogs($xml) {
  $parser = new Log();
  $data = $xml->xpath('//SkierLogs/Season');

  foreach($data as $Season) {
    $season = $Season->attributes()->fallYear;
    foreach($Season as $Skiers) {
      $club = $Skiers->attributes()->clubId;
      foreach($Skiers as $Skier) {
        $skier = $Skier->attributes()->userName;
        foreach($Skier as $Log) {
          foreach($Log as $Entry) {
            $date = $Entry->Date;
            $area = $Entry->Area;
            $distance = $Entry->Distance;

            $parser->parse($season, $club, $skier, $date, $area, $distance);
          }
        }
      }
    }
  }
}
