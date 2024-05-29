<?php
include_once "../database/connection.php";

function deleteNews($id)
{
  global $db;

  $response = [
    "menssage" => "",
    "status" => false
  ];

  $stmt = $db->prepare("DELETE FROM news WHERE id = :id");
  $stmt->bindParam('id', $id);

  if ($stmt->execute() > 0) {
    $response["message"] = "Noticia eliminada correctamente";
    $response["status"] = true;
    return $response;
  } else {
    $response["message"] = "No se pudo eliminar la notiica";
    return $response;
  }
}