<?php

include_once "../database/connection.php";
include_once "../utils/errorcodes.php";

function addUser($username, $fullname, $password, $email, $age, $ci, $phone)
{
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];


  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  $stmt = $db->prepare("
      INSERT INTO users(username, fullname, password, email, age, ci, phone) 
      VALUES (:username,:fullname,:password,:email,:age,:ci,:phone)
    ");
  $stmt->bindParam('username', $username);
  $stmt->bindParam('fullname', $fullname);
  $stmt->bindParam('password', $hashedPassword);
  $stmt->bindParam('email', $email);
  $stmt->bindParam('age', $age);
  $stmt->bindParam('ci', $ci);
  $stmt->bindParam('phone', $phone);

  if ($stmt->execute() > 0) {
    $response["message"] = "Registrado, ya puedes iniciar sesión";
    $response["status"] = true;
    return $response;
  } else {
    $response["message"] = "No se pudo registra";
    return $response;
  }
}