<?php
 
  include_once "../database/connection.php";
  include_once "../utils/errorcodes.php";

  function addKeyword($id, $name){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];


    $stmt = $db->prepare("INSERT INTO keywords (id, name) VALUES (?,?)");
    $stmt->bind_param("is", $id, $name);

    if ($stmt->execute()) {
      $response["message"] = "Keyword añadida correctamente";
      $response["status"] = true;
      $db->close();
      return $response;
    } else {
      // $errMessage = getMessageError($db->errno);
      $response["message"] = $db->error;
      $db->close();
      return $response;
    }
  }

?>