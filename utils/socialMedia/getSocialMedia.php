<?php
  include_once "../database/connection.php";

  function getSocialMedia() {
    global $db;

    $sql = "SELECT * FROM socialMedia";
    $result = $db->query($sql);

    $response = ["status"=>false];

    $place = [];

    while ($row = $result->fetch_assoc()) {
      array_push($place, $row);
    }
    
    $response["status"] = true;
    $response["data"] = $place;
    $db->close();
    return $response;
  }
?>