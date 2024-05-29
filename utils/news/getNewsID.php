<?php
include_once "../database/connection.php";

function getNews($id)
{
  global $db;

  $query = "SELECT name, description, note, author, date FROM news WHERE id = :id";
  $stmt = $db->prepare($query);
  $stmt->bindParam('id', $id);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  $resultData = [
    "status" => false,
    "data" => [

    ]
  ];

  if (!$result) {
    return $resultData;
  }
  $resultData["data"] = $result;
  $resultData["data"]["image"] = "/news/getNewsImg.php?id=" . $id;
  return $resultData;

}