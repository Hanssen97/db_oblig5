<?php

include_once("dbHandler.php");

//------------------------------------------------------------------------------
class Club {
  public $id;
  public $name;
  public $city;

  public function parse($club) {
    $this->id = $club->attributes()->id;
    $this->name = $club->Name;
    $this->city = $club->City;

    $this->save();
  }

  private function save() {
    $db = Database::instance();

    $stmt = $db->prepare(
      'INSERT INTO Clubs (id, name, city) VALUES (:id, :name, :city)'
    ); $stmt->execute([
      ':id' => $this->id,
      ':name' => $this->name,
      ':city' => $this->city
    ]);
  }
}

//------------------------------------------------------------------------------
class City {
  public $cityname;
  public $county;

  public function parse($city) {
    $this->cityname = $city->City;
    $this->county   = $city->County;

    $this->save();
  }

  private function save() {
    $db = Database::instance();

    $stmt = $db->prepare(
      'INSERT INTO Cities (cityname, county) VALUES (:cityname, :county)'
    ); $stmt->execute([
      ':cityname' => $this->cityname,
      ':county' => $this->county,
    ]);
  }
}

//------------------------------------------------------------------------------
class Log {
  public $season;
  public $club;
  public $skier;
  public $date;
  public $area;
  public $distance;

  public function parse($season, $club, $skier, $date, $area, $distance) {
    $this->season = $season;
    $this->club = $club;
    $this->skier = $skier;
    $this->date = $date;
    $this->area = $area;
    $this->distance = $distance;

    $this->save();
  }

  private function save() {
    $db = Database::instance();

    $stmt = $db->prepare(
      'INSERT INTO Logs (season, club, skier, date, area, distance) VALUES (:season, :club, :skier, :date, :area, :distance)'
    ); $stmt->execute([
      ':season' => $this->season,
      ':club' => $this->club,
      ':skier' => $this->skier,
      ':date' => $this->date,
      ':area' => $this->area,
      ':distance' => $this->distance
    ]);
  }
}

//------------------------------------------------------------------------------
class Skier {
  public $username;
  public $firstname;
  public $lastname;
  public $birth;

  public function parse($skier) {
    $this->username = $skier->attributes()->userName;
    $this->firstname = $skier->FirstName;
    $this->lastname = $skier->LastName;
    $this->birth = $skier->YearOfBirth;

    $this->save();
  }

  private function save() {
    $db = Database::instance();

    $stmt = $db->prepare(
      'INSERT INTO Skiers (username, firstname, lastname, birth) VALUES (:username, :firstname, :lastname, :birth)'
    ); $stmt->execute([
      ':username' => $this->username,
      ':firstname' => $this->firstname,
      ':lastname' => $this->lastname,
      ':birth' => $this->birth
    ]);
  }
}

//------------------------------------------------------------------------------
class Season {
  public $year;

  public function parse($season) {
    $this->year = $season->attributes()->fallYear;

    $this->save();
  }

  private function save() {
    $db = Database::instance();

    $stmt = $db->prepare(
      'INSERT INTO Seasons (year) VALUES (?)'
    ); $stmt->execute([
      $this->year
    ]);
  }
}

//------------------------------------------------------------------------------
class TotalDistance {
  public $skiername;
  public $season;
  public $distance;

  public function parse($skiername, $season, $distance) {
    $this->skiername = $skiername;
    $this->season = $season;
    $this->distance = $distance;

    $this->save();
  }

  private function save() {
    $db = Database::instance();

    $stmt = $db->prepare(
      'INSERT INTO TotalDistances (skiername, season, distance) VALUES (:skiername, :season, :distance)'
    ); $stmt->execute([
      ':skiername' => $this->skiername,
      ':season' => $this->season,
      ':distance' => $this->distance
    ]);
  }
}
