<?php
  include_once "../database/connection.php";
  include_once "../utils/errorcodes.php";

  function addEvent($name, $image, $place, $time, $sport, $description, $date_ev){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];


    $stmt = $db->prepare("INSERT INTO event(name, image, place, time, sport, description, date_ev) VALUES(?,?,?,?,?,?)");
    $serializedImage = serialize(file_get_contents($image["tmp_name"]));
    $stmt->bind_param('sssssss', $name, $image["type"], $place, $time, $sport, $description, $date_ev);

    if ($stmt->execute()) {
      $response["message"] = "Evento añadido";
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

?>