<?php
 
  include_once "../database/connection.php";
  include_once "../utils/errorcodes.php";

  function addFaq($name, $responseFaq){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];

 
    $stmt = $db->prepare("INSERT INTO faq(name, response) VALUES(?,?)");
    $stmt->bind_param('ss', $name, $responseFaq);


    if ($stmt->execute()) {
      $response["message"] = "Faq añadidas correctamente";
      $response["status"] = true;
      $db->close();
      return $response;
    } else {
      // $errMessage = getMessageError($db->errno);
      $response["message"] = $stmt->error;
      $db->close();
      return $response;
    }
    }