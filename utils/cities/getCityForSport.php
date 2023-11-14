<?php
  include_once "../database/connection.php";

  function getCityForSport($nameSport){
    global $db;

    $response = ["status" => false];

    $stmt = $db->prepare("SELECT nameCity FROM cityPlace WHERE nameSport = ? ");
    $stmt->bind_param('s', $nameSport);

    $stmt->execute();

    $result = $stmt->get_result();
    $citySports = [];
    

    while ($row = $result->fetch_assoc()) {
      array_push($citySports, $row);
    }
    
    $response["status"] = true;
    $response["data"] = $citySports;
    $db->close();
    return $response;

    $stmt->close();
  }
?>