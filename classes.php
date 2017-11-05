<?php

class Club {
  public $id;
  public $name;
  public $city;

  public function __construct($id = -1, $name, $city) {
    $this->id = $id;
    $this->name = $name;
    $this->city = $city;
  }
}

class City {
  public $cityname;
  public $county;

  public function __construct($city) {
    $this->cityname = $city->City;
    $this->county   = $city->County;
  }
}

class Log {
  public $id;
  public $season;
  public $club;
  public $skier;
  public $date;
  public $area;
  public $distance;

  public function __construct($id, $season, $club, $skier, $date, $area, $distance) {
    $this->id = $id;
    $this->season = $season;
    $this->club = $club;
    $this->skier = $skier;
    $this->date = $date;
    $this->area = $area;
    $this->distance = $distance;
  }
}

class Skier {
  public $username;
  public $firstname;
  public $lastname;
  public $birth;

  public function __construct($username, $firstname, $lastname, $birth) {
    $this->username = $username;
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->birth = $birth;
  }
}
