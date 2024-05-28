<?php
include_once "../database/connection.php";

function editStatus($id, $st, $newStatus)
{
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];

  $stmt = $db->prepare("UPDATE contact SET status = :status WHERE id = :id");
  $stmt->bindParam('status', $newStatus);
  $stmt->bindParam('id', $id);


  if ($stmt->execute()) {
    $response["message"] = "Estado editado";
    $response["status"] = true;
    return $response;
  } else {
    $response["message"] = "No se pudo editar el estado";
    return $response;
  }
}
