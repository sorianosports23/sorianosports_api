<?php
  include_once "../database/connection.php";

  function getCityPlace($nameSport) {
    global $db;

    $sql = "SELECT nameSport, typeSport FROM cityPlace WHERE nameCity = '$nameSport'";
    $result = $db->query($sql);

    $response = ["status"=>false];

    $sports = [];

    while ($row = $result->fetch_assoc()) {
      $data = [
        "name" => $row["nameSport"],
        "type" => $row["typeSport"]
      ];
      array_push($sports, $data);
    }
    
    $response["status"] = true;
    $response["data"] = $sports;
    $db->close();
    return $response;
  }
?>