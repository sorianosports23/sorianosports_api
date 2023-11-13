<?php
 include_once "../database/connection.php";

 function getSports($id){
  global $db;

  $stmt = $db->prepare("SELECT * FROM summerSport WHERE id = ?");
  $stmt->bind_param('i', $id);

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