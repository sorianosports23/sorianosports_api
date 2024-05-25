<?php
include_once "../database/connection.php";

function deleteFaq($id)
{
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];

  $stmt = $db->prepare("DELETE FROM faq WHERE id = :id");
  $stmt->bindParam("id", $id);

  if ($stmt->execute() > 0) {
    $response["message"] = "FAQ eliminado correctamente";
    $response["status"] = true;
    return $response;
  } else {
    $response["message"] = "No se pudo eliminar";
    return $response;
  }
}