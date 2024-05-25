<?php
include_once "../database/connection.php";

function modifySocialMedia($socialMedia, $newLink)
{
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];

  $stmt = $db->prepare("UPDATE socialMedia SET link = :link WHERE name = :name");
  $stmt->bindParam("link", $newLink);
  $stmt->bindParam("name", $socialMedia);


  if ($stmt->execute() > 0) {
    $response["message"] = "Red social editada";
    $response["status"] = true;
    return $response;
  } else {
    $response["message"] = "No se pudo editar la red social";
    return $response;
  }
}