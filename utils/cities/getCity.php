<?php
include_once "../database/connection.php";

function getCityPlace($nameSport)
{
  global $db;

  $sql = "SELECT nameSport, typeSport FROM cityPlace WHERE nameCity = :sport";
  $stmt = $db->prepare($sql);
  $stmt->bindParam("sport", $nameSport);
  $stmt->execute();
  $result = $stmt->fetchAll();

  $response = ["status" => false];

  $sports = [];

  foreach ($result as $row) {
    $data = [
      "name" => $row["nameSport"],
      "type" => $row["typeSport"]
    ];
    array_push($sports, $data);
  }

  $response["status"] = true;
  $response["data"] = $sports;
  return $response;
}