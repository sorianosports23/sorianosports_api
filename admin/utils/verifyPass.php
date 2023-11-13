<?php
  include_once "../database/connection.php";

  function verifyPass($username, $password) {
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];
  }
    function getPassFromDB($username) {
      global $db;
  
      $query = "SELECT password FROM users WHERE username = '$username'";
  
      $result = $db->query($query);
      if ($result->num_rows === 0) {
        return null;
      }
  
      $resultFetch = $result->fetch_assoc();
      return $resultFetch;
  
  }
?>