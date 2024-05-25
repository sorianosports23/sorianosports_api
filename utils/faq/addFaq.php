<?php

include_once "../database/connection.php";
include_once "../utils/errorcodes.php";

function addFaq($name, $responseFaq)
{
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];


  $stmt = $db->prepare("INSERT INTO faq(name, response) VALUES(:name,:res)");
  $stmt->bindParam("name", $name);
  $stmt->bindParam("res", $responseFaq);


  if ($stmt->execute() > 0) {
    $response["message"] = "FAQ añadida correctamente";
    $response["status"] = true;
    return $response;
  } else {
    $response["message"] = "No se pudo añadir";
    return $response;
  }
}