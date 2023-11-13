<?php
 include_once "../database/connection.php";

 function getGreatEvents($id){
  global $db;

  $query = "SELECT * FROM greatEvents WHERE id = $id";

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
  $resultData["data"]["image"] = "/greatEvents/getImage.php?id=".$id;
  $resultData["status"] = true;
  return $resultData;



 }
?>