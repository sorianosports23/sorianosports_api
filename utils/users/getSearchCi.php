<?php
include_once "../database/connection.php";
include_once "getPermissions.php";

function getSearchCi($ci)
{
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];

  $stmt = $db->prepare("SELECT username, fullname, email, age, ci, phone FROM users WHERE ci = :ci");
  $stmt->bindParam('ci', $ci);
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