<?php
include_once "../database/connection.php";

function deleteDirective($id)
{
  global $db;

  $response = [
    "menssage" => "",
    "status" => false
  ];

  $stmt = $db->prepare("DELETE FROM directive WHERE id = :id");
  $stmt->bindParam('id', $id);

  if ($stmt->execute() > 0) {
    $response["message"] = "Eliminado correctamente";
    $response["status"] = true;
    return $response;
  } else {
    $response["message"] = "No se pudo eliminar";
    return $response;
  }
}