<?php
include_once "../database/connection.php";

function askPermission($username)
{
  global $db;

  $query = "SELECT * FROM permissions WHERE username = :user";
  $stmt = $db->prepare($query);
  $stmt->bindParam("user", $username);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $grant = false;

  foreach ($result as $row) {
    if ($row["permission"] == "editor" || $row["permission"] == "admin") {
      $grant = true;
    }
  }

  return $grant;
}