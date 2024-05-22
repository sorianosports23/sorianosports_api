<?php

include_once "../database/connection.php";
include_once "../utils/errorcodes.php";

function addContact($username, $name, $email, $subject, $messageContact)
{
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];

  $status = 1;
  $stmt = $db->prepare("INSERT INTO contact(username, name, correo, subject, messageContact, status) VALUES(:user,:user_name,:email,:subject,:message,:status)");
  $stmt->bindParam(':user', $username);
  $stmt->bindParam(':user_name', $name);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':subject', $subject);
  $stmt->bindParam(':message', $messageContact);
  $stmt->bindParam(':status', $status);

  if ($stmt->execute() > 0) {
    $response["message"] = "Enviado Correctamente";
    $response["status"] = true;
    return $response;
  } else {
    $response["message"] = 'No se pudo enviar el mensaje';
    return $response;
  }
}