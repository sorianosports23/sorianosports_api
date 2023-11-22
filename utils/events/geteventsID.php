<?php
 include_once "../database/connection.php";

 function getEventID($id){
  global $db;

  $query = "SELECT id, name, city, place, time, sport, rules, inscriptionInfo, extraInfo, description, date_ev, urlUbi FROM event WHERE id = $id";

  $resultData = [
    "status" => false,
    "data" => [

    ]
  ];

  $eventsID = [];

  $result = $db->query($query);

  if($result->num_rows==0){
     return $resultData;
  }
  else{
    $resultData["status"] = true;
    $resultData["data"] = $eventsID  ;
  }
  $resultFetch = $result->fetch_assoc();
  $resultData["data"] = $resultFetch;
  $db->close();
  return $resultData;

 }
?>