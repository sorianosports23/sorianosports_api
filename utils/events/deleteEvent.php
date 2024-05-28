<?php
include_once "../database/connection.php";

function deleteEvents($id)
{
  global $db;

  $response = [
    "menssage" => "",
    "status" => false
  ];

  $stmt = $db->prepare("DELETE FROM event WHERE id = :id");
  $stmt->bindParam('id', $id);

  if ($stmt->execute() > 0) {
    $response["message"] = "Evento eliminado correctamente";
    $response["status"] = true;
    return $response;
  } else {
    $response["message"] = "No se pudo editar el evento";
    return $response;
  }
}