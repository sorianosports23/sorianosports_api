<?php
  include_once "../database/connection.php";

  function getUserFromDB($username) {
    global $db;

    $query = "SELECT username, fullname, email, age, ci, phone FROM users WHERE username = '$username'";

    $result = $db->query($query);
    if ($result->num_rows === 0) {
      return null;
    }

    $resultFetch = $result->fetch_assoc();
    $db->close();
    return $resultFetch;
  }
?>