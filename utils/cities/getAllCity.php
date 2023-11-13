<?php
  include_once "../database/connection.php";

  function getCityPlace() {
    global $db;

    $sql = "SELECT * FROM cityPlace";
    $result = $db->query($sql);

    $response = ["status"=>false];

    $cityPlace = [];

    while ($row = $result->fetch_assoc()) {
      array_push($cityPlace, $row);
    }
    
    $response["status"] = true;
    $response["data"] = $cityPlace;
    $db->close();
    return $response;
  }
?>