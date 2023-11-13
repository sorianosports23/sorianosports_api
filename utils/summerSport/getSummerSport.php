<?php
  include_once "../database/connection.php";

  function getsummerSport() {
    global $db;

    $sql = "SELECT name, city FROM summerSport";
    $result = $db->query($sql);

    $response = ["status"=>false];

    $summerSport = [];

    while ($row = $result->fetch_assoc()) {
      array_push($summerSport, $row);
    }
    
    $response["status"] = true;
    $response["data"] = $summerSport;
    $db->close();
    return $response;
  }
?>