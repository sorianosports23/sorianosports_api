<?php
  include_once "../database/connection.php";

  function getCityPlace($nameSport) {
    global $db;

    $sql = "SELECT nameSport FROM cityPlace WHERE nameCity = '$nameSport'";
    $result = $db->query($sql);

    $response = ["status"=>false];

    $sports = [];

    while ($row = $result->fetch_assoc()) {
      array_push($sports, $row["nameSport"]);
    }
    
    $response["status"] = true;
    $response["data"] = $sports;
    $db->close();
    return $response;
  }
?>