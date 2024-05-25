<?php
include_once "../database/connection.php";

function getKeyword($id)
{
  global $db;

  $sql = "SELECT * FROM keywords WHERE id = :id";
  $stmt = $db->prepare($sql);
  $stmt->bindParam("id", $id);
  $stmt->execute();
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $keyword = [];

  foreach ($data as $row) {
    array_push($keyword, $row["name"]);
  }

  $response["status"] = true;
  $response["data"] = $keyword;
  return $response;
}