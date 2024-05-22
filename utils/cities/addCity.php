<?php

include_once "../database/connection.php";
include_once "../utils/errorcodes.php";

function addCityPlace($nameCity, $nameSport, $typeSport)
{
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];

  $stmt = $db->prepare("INSERT INTO cityPlace(nameCity, nameSport, typeSport) VALUES(:city,:sport,:type)");
  $stmt->bindParam('city', $nameCity);
  $stmt->bindParam('sport', $nameSport);
  $stmt->bindParam('type', $typeSport);

  if ($stmt->execute()) {
    $response["message"] = "Deporte añadido";
    $response["status"] = true;
    return $response;
  } else {
    $response["message"] = "No se pudo añadir el deporte";
    return $response;
  }
}