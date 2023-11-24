<?php
  include_once "../database/connection.php";

  function getGreatEventForCheck($check){
    $sql = "SELECT * FROM greatEvent WHERE check_Great = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $check);
    $result = $stmt->execute();
    $res = $stmt->get_result();

    $response = ["status"=>false];

    $check= [];

    while ($row = $res->fetch_assoc()) {
      array_push($check, $row);
    }
    
    $response["status"] = true;
    $response["data"] = $check;
    $db->close();
    return $response;
  }
?>