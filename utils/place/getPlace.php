<?php
include_once "../database/connection.php";

function getPlace($city)
{
  global $db;

  $sql = "SELECT * FROM place WHERE city = :city";
  $stmt = $db->prepare($sql);
  $stmt->bindParam("city", $city);
  $stmt->execute();
  $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $response = ["status" => false];

  $place = [];

  foreach ($res as $row) {
    array_push($place, $row);
  }

  $response["status"] = true;
  $response["data"] = $place;
  return $response;
}