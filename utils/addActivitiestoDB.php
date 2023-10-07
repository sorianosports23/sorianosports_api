<?php

  include_once "../database/connection.php";
  include_once "errorcodes.php";

  function addActivities($name, $place, $sport, $description){
   global $db;

   $response = [
     "message" => "",
     "stutus"=> false    
   ];

   $query = "INSERT INTO activities(name, place, sport, description) VALUES('$name', '$place', '$sport', '$description')";

   if($db->query($query)){
     $response["message"] = "Actividad añadida correctamente";
     $response["status"] = true;
     $db->close();
     return $response;
   }
 else{
  $errMessage = getMessageError($db->errno);
   $response["message"] = $errMessage;
   $db->close();
   return $response;
   }
   
  }
?>
