<?php
 include_once "../database/connection.php";

 function getNews($id){
  global $db;

  $query = "SELECT name, description, note, author, date FROM news WHERE id = $id";

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
  $resultData["data"]["image"] = "/news/getNewsImg.php?id=".$id;
  return $resultData;

 }
?>