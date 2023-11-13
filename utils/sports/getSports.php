<?php
  include_once "../database/connection.php";

  function getSports() {
    global $db;

    $sql = "SELECT name, city FROM sports";
    $result = $db->query($sql);

    $response = ["status"=>false];

    $sports = [];

    while ($row = $result->fetch_assoc()) {
      array_push($sports, $row);
    }
    
    $response["status"] = true;
    $response["data"] = $sports;
    $db->close();
    return $response;
  }
?>