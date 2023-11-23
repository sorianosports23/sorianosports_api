<?php
  include_once "../database/connection.php";

  function getMessages($username) {
    global $db;

    $query = "SELECT * FROM contact WHERE username = '$username'";
    $res = $db->query($query);

    $response = [
      "status" => false,
    ];

    $messages = [];

    while ($row = $res->fetch_assoc()) {
      array_push($messages, $row);
    }

    $response["status"] = true;
    $response["data"] = $messages;
    $db->close();
    return $response;
  }
?>