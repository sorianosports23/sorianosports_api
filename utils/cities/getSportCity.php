<?php
  include_once "../database/connection.php";

  function getSportCity($city) {
    global $db;

    $stmt = $db->prepare("SELECT * FROM place WHERE city = ?");
    $stmt->bind_param('s', $city);

    $res = $stmt->execute();

    $response = ["status"=>false];

    $sports = [];

    if ($res) {
      $result = $stmt->get_result();
      while ($row = $result->fetch_assoc()) {
        array_push($sports, $row);
      }
    }

    
    $response["status"] = true;
    $response["data"] = $sports;
    $db->close();
    return $response;
  }
?>