<?php
include_once "../database/connection.php";

function getPermissionsFromUser($username)
{
  global $db;

  $sql = "SELECT permission FROM permissions WHERE username = :user";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(":user", $username);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $perms = [];

  if (!$result)
    return [];

  foreach ($result as $row) {
    array_push($perms, $row["permission"]);
  }

  return $perms;
}