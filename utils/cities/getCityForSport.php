<?php
include_once "../database/connection.php";

function getCityForSport($nameSport)
{
  global $db;

  $response = ["status" => false];

  $stmt = $db->prepare("SELECT nameCity, typeSport FROM cityPlace WHERE nameSport = :sport ");
  $stmt->bindParam('sport', $nameSport);
  $stmt->execute();

  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $citySports = [];


  foreach ($result as $row) {
    array_push($citySports, $row["namecity"]);
  }

  $response["status"] = true;
  $response["data"] = $citySports;
  return $response;
}