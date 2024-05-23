<?php
include_once "../database/connection.php";

function getDirective()
{
  global $db;

  $sql = "SELECT id, name, rank, imgType FROM directive";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $response = ["status" => false];

  $contact = [];

  foreach ($result as $row) {
    $row["image"] = "/directive/getImage.php?id=" . $row["id"];
    array_push($contact, $row);
  }

  $response["status"] = true;
  $response["data"] = $contact;
  return $response;
}