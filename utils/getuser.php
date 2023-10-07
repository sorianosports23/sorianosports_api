<?php
  include_once "../database/connection.php";

  function getUserPassword($username) {
    global $db;

    $query = "SELECT password FROM users WHERE username = '$username'";

    $result = $db->query($query);
    if ($result->num_rows === 0) {
      return null;
    }
    $resultFetch = $result->fetch_assoc();
    return $resultFetch["password"];
  }

?>