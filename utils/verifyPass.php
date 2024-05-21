<?php
include_once "../database/connection.php";

function verifyPass($username, $password)
{
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];
}
function getPassFromDB($username)
{
  global $db;

  $query = "SELECT password FROM users WHERE username = :user";
  $stmt = $db->prepare($query);
  $stmt->bindParam(":user", $username);
  $stmt->execute();

  $result = $stmt->fetch();
  if (!$result) {
    return null;
  }

  return $result;
}