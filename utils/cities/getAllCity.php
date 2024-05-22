<?php
include_once "../database/connection.php";

function getAllCity()
{
  global $db;

  $sql = "SELECT * FROM cityPlace";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $response = ["status" => false];

  $cityPlace = [];

  foreach ($result as $row) {
    $sport = [
      "name" => $row["namesport"],
      "type" => $row["typesport"]
    ];
    array_push($cityPlace, $sport);
  }

  $response["status"] = true;
  $response["data"] = $cityPlace;
  return $response;
}