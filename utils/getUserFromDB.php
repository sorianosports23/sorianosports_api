<?php
include_once "../database/connection.php";

function getUserFromDB($username)
{
  global $db;

  $query = "SELECT username, fullname, email, age, ci, phone FROM users WHERE username = :user";
  $stmt = $db->prepare($query);
  $stmt->bindParam(":user", $username);
  $stmt->execute();

  $result = $stmt->fetch();
  if (!$result) {
    return null;
  }

  return $result;
}