<?php
  include_once "../database/connection.php";

  function getAllCity() {
    global $db;

    $sql = "SELECT * FROM cityPlace";
    $result = $db->query($sql);

    $response = ["status"=>false];

    $cityPlace = [];

    while ($row = $result->fetch_assoc()) {
      array_push($cityPlace, $row["nameSport"]);
    }
    
    $response["status"] = true;
    $response["data"] = $cityPlace;
    $db->close();
    return $response;
  }
?>