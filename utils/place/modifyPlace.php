<?php
include_once "../database/connection.php";

function modifyPlace($placeID, $place, $newPlace)
{
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];

  $stmt = $db->prepare("UPDATE place SET $place = :place WHERE id = :id");
  $stmt->bindParam('place', $newPlace);
  $stmt->bindParam('id', $placeID);

  if ($stmt->execute()) {
    $response["message"] = "Lugar editado";
    $response["status"] = true;
    return $response;
  } else {
    $response["message"] = "No se pudo editar el lugar";
    return $response;
  }
}
