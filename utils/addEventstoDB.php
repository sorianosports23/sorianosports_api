<?php
   include_once "../database/connection.php";
   include_once "errorcodes.php";

   function addEvents($id, $fecha, $horario){
    global $db;

    $response = [
      "message" => "",
      "stutus"=> false    
    ];

    $query = "INSERT INTO events VALUES($id, $fecha, $horario)";

    if($db->query($query)){
      $response["message"] = "Evento añadido correctamente";
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