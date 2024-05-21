<?php
include_once "../database/connection.php";

function getUserPassword($username)
{
  global $db;

  $query = "SELECT password FROM users WHERE username = '$username'";
  $stmt = $db->prepare($query);
  $stmt->execute();


  $result = $stmt->fetch();
  if (!$result) {
    return null;
  }
  return $result["password"];
}