<?php
  include_once "../database/connection.php";
  include_once "../utils/errorcodes.php";

  function addEvent($name, $image, $city, $place, $time, $sport, $rules, $inscriptionInfo, $extraInfo, $description, $date_ev, $urlUbi){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];


    $stmt = $db->prepare("INSERT INTO event(name, image, imgType, city, place, time, sport, rules, inscriptionInfo, extraInfo, description, date_ev, urlUbi) VALUES(?,?,?,?,?,?,?,?,?,?)");
    $serializedImage = serialize(file_get_contents($image["tmp_name"]));
    $stmt->bind_param('sssssssssss', $name, $serializedImage, $image["type"], $city, $place, $time, $sport, $rules, $inscriptionInfo, $extraInfo, $description, $date_ev, $urlUbi);


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