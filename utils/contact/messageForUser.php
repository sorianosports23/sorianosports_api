<?php

include_once "../database/connection.php";

function messageForUser($id, $message)
{
  global $db;

  $response = [
    "message" => "",
    "status" => true
  ];

  $stmt = $db->prepare("INSERT INTO messageForUser(id, message) VALUES(:id,:msg)");
  $stmt->bindParam('id', $id);
  $stmt->bindParam('msg', $message);

  if ($stmt->execute() > 0) {
    $response["message"] = "Mensaje enviado correctamente";
    $response["status"] = true;
    return $response;
  } else {
    $response["message"] = "No se pudo enviar el mensaje";
    return $response;
  }

}