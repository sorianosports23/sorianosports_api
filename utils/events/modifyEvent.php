<?php
include_once "../database/connection.php";

function modifyEvents($eventsID, $events, $newEvent)
{
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];

  $stmt = $db->prepare("UPDATE event SET $events = :newattr WHERE id = :id");
  $stmt->bindParam("id", $eventsID);
  ;

  if ($events === "image") {
    $img = file_get_contents($newEvent["tmp_name"]);
    $stmt->bindParam("newattr", $img, PDO::PARAM_LOB);
  } else {
    $stmt->bindParam('newattr', $newEvent);
  }

  if ($stmt->execute() > 0) {
    $response["message"] = "Evento editado";
    $response["status"] = true;
    return $response;
  } else {
    $response["message"] = "No se pudo editar";
    return $response;
  }
}
