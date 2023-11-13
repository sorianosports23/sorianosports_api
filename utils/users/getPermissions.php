<?php
  include_once "../database/connection.php";

  function getPermissionsFromUser($username) {
    global $db;

    $sql = "SELECT permission FROM permission WHERE username = '$username'";
    $result = $db->query($sql);

    $perms = [];

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        array_push($perms, $row["permission"]);
      }
      return $perms;
    } else {
      return [];
    }
  }
?>