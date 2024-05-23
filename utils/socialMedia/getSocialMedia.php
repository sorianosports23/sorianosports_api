<?php
include_once "../database/connection.php";

function getSocialMedia()
{
  global $db;

  $sql = "SELECT * FROM socialMedia";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $response = ["status" => false];

  $place = [];

  foreach ($result as $row) {
    array_push($place, $row);
  }

  $response["status"] = true;
  $response["data"] = $place;
  return $response;
}