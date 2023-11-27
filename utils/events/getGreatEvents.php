<?php
  include_once "../database/connection.php";

  function getGreatEvent(){
    global $db;

    $sql = "SELECT id, name, description, date_ev FROM event WHERE check_Great = 1 LIMIT 10";
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