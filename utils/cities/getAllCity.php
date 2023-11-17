<?php
  include_once "../database/connection.php";

  function getAllCity() {
    global $db;

    $sql = "SELECT * FROM cityPlace";
    $result = $db->query($sql);

    $response = ["status"=>false];

    $cityPlace = [];

    while ($row = $result->fetch_assoc()) {
      $sport = [
        "name" => $row["nameSport"],
        "type" => $row["typeSport"]
      ];
      array_push($cityPlace, $sport);
    }
    
    $response["status"] = true;
    $response["data"] = $cityPlace;
    $db->close();
    return $response;
  }
?>