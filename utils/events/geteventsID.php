<?php
include_once "../database/connection.php";

function getEventID($id)
{
  global $db;

  $query = "SELECT id, name, city, place, time, sport, rules, inscriptioninfo, extrainfo, description, date_ev, urlubi, check_great FROM event WHERE id = :id";
  $stmt = $db->prepare($query);
  $stmt->bindParam("id", $id);
  $stmt->execute();

  $resultData = [
    "status" => false,
    "data" => [

    ]
  ];

  $eventsID = [];

  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$result) {
    return $resultData;
  } else {
    $resultData["status"] = true;
  }
  $resultData["data"] = $result;
  return $resultData;
}