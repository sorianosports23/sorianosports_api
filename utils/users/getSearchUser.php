<?php
include_once "../database/connection.php";
include_once "getPermissions.php";

function getSearchUser($username)
{
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];

  $stmt = $db->prepare("SELECT username, fullname, email, age, ci, phone FROM users WHERE username = :user");
  $stmt->bindParam(':user', $username);
  $stmt->execute();
  $user = $stmt->fetch();

  if (!$user) {
    $response["data"] = [];
    $response["message"] = "El usuario no existe";
    return $response;
  }

  $user["permissions"] = getPermissionsFromUser($user["username"]);
  $response["data"] = $user;
  $response["status"] = true;
  return $response;
}