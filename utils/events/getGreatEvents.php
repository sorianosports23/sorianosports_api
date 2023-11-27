<?php
  include_once "../database/connection.php";

  function getGreatEvent($check){
    global $db;

    $sql = "SELECT * FROM event WHERE check_Great = 1 LIMIT 10";
    $result = $db->query($sql);

    $response = ["status"=>false];

    $check= [];

    while ($row = $result->fetch_assoc()) {
      array_push($check, $row);
    }
    
    $response["status"] = true;
    $response["data"] = $check;
    $db->close();
    return $response;
  }
?>