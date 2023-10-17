<?php
  include_once "../database/connection.php";

  function getDirective() {
    global $db;

    $sql = "SELECT id, name, rank, imgType FROM directive";
    $result = $db->query($sql);

    $response = ["status"=>false];

    $contact = [];

    while ($row = $result->fetch_assoc()) {
      $row["image"] = "/directive/getImage.php?id=".$row["id"];
      array_push($contact, $row);
    }
    
    $response["status"] = true;
    $response["data"] = $contact;
    $db->close();
    return $response;
  }
?>