<?php
  include_once "../database/connection.php";

  function getPlace($city) {
    global $db;

    $sql = "SELECT * FROM place WHERE city = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $city);
    $result = $stmt->execute();
    $res = $stmt->get_result();

    $response = ["status"=>false];

    $place = [];

    while ($row = $res->fetch_assoc()) {
      array_push($place, $row);
    }
    
    $response["status"] = true;
    $response["data"] = $place;
    $db->close();
    return $response;
  }
?>