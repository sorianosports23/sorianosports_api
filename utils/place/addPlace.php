<?php
 
  include_once "../database/connection.php";
  include_once "../utils/errorcodes.php";

  function addPlace($sport, $age, $city, $place, $teacher, $date, $time){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("INSERT INTO place (sport, age, city, place, teacher, date, time) VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssss", $sport, $age, $city, $place, $teacher, $date, $time);

    if ($stmt->execute()) {
      $response["message"] = "Lugar añadido correctamente";
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