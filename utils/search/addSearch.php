<?php

include_once "../database/connection.php";
include_once "../utils/errorcodes.php";

function addSearch($name, $to, $description)
{
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];


  $stmt = $db->prepare("INSERT INTO search (name, url, description) VALUES (:name,:url,:description)");
  $stmt->bindParam('name', $name);
  $stmt->bindParam('url', $to);
  $stmt->bindParam('description', $description);

  if ($stmt->execute() > 0) {
    $response["message"] = "Añadido correctamente";
    $response["status"] = true;
    return $response;
  } else {
    $response["message"] = "No se pudo añadir";
    return $response;
  }
}