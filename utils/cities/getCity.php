<?php
include_once "../database/connection.php";

function getCityPlace($nameSport)
{
  global $db;

  $sql = "SELECT nameSport, typeSport FROM cityPlace WHERE nameCity = :sport";
  $stmt = $db->prepare($sql);
  $stmt->bindParam("sport", $nameSport);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $response = ["status" => false];

  $sports = [];

  foreach ($result as $row) {
    $data = [
      "name" => $row["namesport"],
      "type" => $row["typesport"]
    ];
    array_push($sports, $data);
  }

  $response["status"] = true;
  $response["data"] = $sports;
  return $response;
}