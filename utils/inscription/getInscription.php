<?php
  include_once "../database/connection.php";

  function getInscription() {
    global $db;

    $sql = "SELECT * FROM inscriptionform ORDER BY id DESC";
    $result = $db->query($sql);

    $response = ["status"=>false];

    $inscription = [];

    while ($row = $result->fetch_assoc()) {
      array_push($inscription, $row);
    }
    
    $response["status"] = true;
    $response["data"] = $inscription;
    $db->close();
    return $response;
  }
?>