<?php
  include_once "../database/connection.php";

  function getPlace() {
    global $db;

    $sql = "SELECT * FROM place";
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