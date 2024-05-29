<?php
include_once "../database/connection.php";

function getImage($id)
{
  global $db;

  $query = "SELECT img, imgtype FROM news WHERE id = :id";
  $stmt = $db->prepare($query);
  $stmt->bindParam("id", $id);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($result) {
    $imageInfo = [];

    $imageInfo["img"] = $result["img"];
    $imageInfo["imgType"] = $result["imgtype"];

    return $imageInfo;
  } else {
    return [
      "message" => "No se encontro la imagen",
      "status" => false
    ];
  }
}