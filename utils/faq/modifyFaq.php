<?php
include_once "../database/connection.php";

function modifyFaq($faqID, $name, $newName)
{
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];

  $stmt = $db->prepare("UPDATE faq SET $name = :attr WHERE id = :id");
  $stmt->bindParam("attr", $newName);
  $stmt->bindParam("id", $faqID);


  if ($stmt->execute() > 0) {
    $response["message"] = "Nombre de FAQ editado";
    $response["status"] = true;
    return $response;
  } else {
    $response["message"] = "No se pudo editar";
    return $response;
  }
}