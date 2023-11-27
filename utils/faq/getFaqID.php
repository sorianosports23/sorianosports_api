<?php
 include_once "../database/connection.php";

 function getFaqID($id){
  global $db;

  $query = "SELECT * FROM faq WHERE id = $id";

  $resultData = [
    "status" => false,
    "data" => [

    ]
  ];

  $result = $db->query($query);

  if($result->num_rows==0){
    $db->close();
      return $resultData;
  }
  $resultFetch = $result->fetch_assoc();
  $resultData["data"] = $resultFetch;
  return $resultData;

 }
?>