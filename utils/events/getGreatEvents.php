<?php
include_once "../database/connection.php";

function getGreatEvent()
{
  global $db;

  $sql = "SELECT id, name, description, date_ev FROM event WHERE check_great = true LIMIT 10";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $response = ["status" => false];

  $check = [];

  foreach ($result as $row) {
    array_push($check, $row);
  }

  $response["status"] = true;
  $response["data"] = $check;
  return $response;
}