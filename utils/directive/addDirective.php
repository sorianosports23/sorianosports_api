<?php

include_once "../database/connection.php";
include_once "../utils/errorcodes.php";

function addDirective($image, $name, $rank)
{
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];

  $stmt = $db->prepare("INSERT INTO directive (image, name, rank, imgType) VALUES (:img,:name,:rank,:imgType)");

  $serializedImage = file_get_contents($image["tmp_name"]);

  $stmt->bindParam('img', $serializedImage, PDO::PARAM_LOB);
  $stmt->bindParam('name', $name);
  $stmt->bindParam('rank', $rank);
  $stmt->bindParam('imgType', $image['type']);

  if ($stmt->execute() > 0) {
    $response["message"] = "Añadido correctamente";
    $response["status"] = true;
    return $response;
  } else {
    $response["message"] = "No se pudo añadir";
    return $response;
  }
}