<?php

include_once "../database/connection.php";
include_once "../utils/errorcodes.php";

function addKeyword($id, $name)
{
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];


  $stmt = $db->prepare("INSERT INTO keywords (id, name) VALUES (:id,:name)");
  $stmt->bindParam("id", $id);
  $stmt->bindParam("name", $name);

  if ($stmt->execute() > 0) {
    $response["message"] = "Keyword añadida correctamente";
    $response["status"] = true;
    return $response;
  } else {
    $response["message"] = "No se pudo añadir";
    return $response;
  }
}