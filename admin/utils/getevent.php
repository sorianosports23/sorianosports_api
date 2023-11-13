<?php
 include_once "./database/connection.php";

 function getEvent($id){
  global $db;

  $query = "SELECT * FROM events LEFT JOIN activities ON events.id = activities.id WHERE id = $id  ";

  $result = $db->query($query);
  $resultFetch = $result->fetch_assoc();
  return $resultFetch;

 }
?>