<?php

include_once "../database/connection.php";
include_once "../utils/errorcodes.php";

function addPlace($sport, $age, $city, $place, $teacher, $date, $time)
{
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];

  $stmt = $db->prepare("INSERT INTO place (sport, age, city, place, teacher, date, time) VALUES (:sport,:age,:city,:place,:teacher,:date,:time)");
  $stmt->bindParam("sport", $sport);
  $stmt->bindParam("age", $age);
  $stmt->bindParam("city", $city);
  $stmt->bindParam("place", $place);
  $stmt->bindParam("teacher", $teacher);
  $stmt->bindParam("date", $date);
  $stmt->bindParam("time", $time);

  if ($stmt->execute()) {
    $response["message"] = "Lugar añadido correctamente";
    $response["status"] = true;
    return $response;
  } else {
    $response["message"] = "No se pudo añadir el lugar";
    return $response;
  }
}