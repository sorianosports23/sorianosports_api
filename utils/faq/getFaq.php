<?php
  include_once "../database/connection.php";

  function getFaq() {
    global $db;

    $sql = "SELECT * FROM faq";
    $result = $db->query($sql);

    $response = ["status"=>false];

    $faq = [];

    while ($row = $result->fetch_assoc()) {
      array_push($faq, $row);
    }
    
    $response["status"] = true;
    $response["data"] = $faq;
    $db->close();
    return $response;
  }
?>