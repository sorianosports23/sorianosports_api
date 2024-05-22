<?php
include_once "../database/connection.php";

function deletePlace($id)
{
  global $db;

  $response = [
    "menssage" => "",
    "status" => false
  ];

  $stmt = $db->prepare("DELETE FROM place WHERE id = :id");
  $stmt->bindParam('id', $id);

  if ($stmt->execute()) {
    $response["message"] = "Lugar eliminado correctamente";
    $response["status"] = true;
    return $response;
  } else {
    $response["message"] = "No se pudo eliminar el lugar";
    return $response;
  }
}