<?php
include_once "../database/connection.php";

function getImage($id)
{
  global $db;

  $query = "SELECT image, imgtype FROM event WHERE id = :id";
  $stmt = $db->prepare($query);
  $stmt->bindParam("id", $id);
  $stmt->execute();
  $res = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($res) {
    $imageInfo = [];

    $imageInfo["img"] = $res["image"];
    $imageInfo["imgType"] = $res["imgtype"];

    return $imageInfo;
  } else {
    return [
      "message" => "No se encontro la imagen",
      "status" => false
    ];
  }
}