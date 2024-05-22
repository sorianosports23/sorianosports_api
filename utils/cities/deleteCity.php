<?php
include_once "../database/connection.php";

function deleteCityPlace($nameCity, $nameSport, $typeSport)
{
  global $db;

  $response = [
    "menssage" => "",
    "status" => false
  ];

  $stmt = $db->prepare("DELETE FROM cityPlace WHERE nameCity = :city AND nameSport = :sport AND typesport = :type");
  $stmt->bindParam("city", $nameCity);
  $stmt->bindParam("sport", $nameSport);
  $stmt->bindParam("type", $typeSport);

  if ($stmt->execute()) {
    $response["message"] = "Deporte eliminado";
    $response["status"] = true;
    return $response;
  } else {
    $response["message"] = "No se pudo eliminar el deporte";
    return $response;
  }
}