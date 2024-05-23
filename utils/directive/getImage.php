<?php
include_once "../database/connection.php";

function getImage($id)
{
  global $db;

  $query = "SELECT image, imgType FROM directive WHERE id = $id";
  $stmt = $db->prepare($query);
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