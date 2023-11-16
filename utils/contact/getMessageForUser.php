<?php
  include_once "../database/connection.php";

  function getMessageForUser($username){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];

    $sql = "SELECT username, message FROM messageForUser WHERE username = '$username'";
    $result = $db->query($sql);
  

    $usernameMessage = [];

    while ($row = $result->fetch_assoc()) {
      array_push($usernameMessage, $row["username"]);
      array_push($usernameMessage, $row["message"]);
    }
    
    $response["message"] = "Se envio correctamente";
    $response["status"] = true;
    $response["data"] = $usernameMessage;
    $response["data"] = $usernameMessage;
    $db->close();
    return $response;
  }
?>