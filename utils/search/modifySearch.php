<?php
include_once "../database/connection.php";

function modifySearch($searchID, $search, $newSearch)
{
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];

  $stmt = $db->prepare("UPDATE search SET $search = :search WHERE id = :id");
  $stmt->bindParam('search', $newSearch);
  $stmt->bindParam('id', $searchID);


  if ($stmt->execute() > 0) {
    $response["message"] = "Busqueda editada";
    $response["status"] = true;
    return $response;
  } else {
    $response["message"] = "No se pudo editar la busqueda";
    return $response;
  }
}
