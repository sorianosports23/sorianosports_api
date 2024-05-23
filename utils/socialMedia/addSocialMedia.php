<?php

include_once "../database/connection.php";
include_once "../utils/errorcodes.php";

function addSocialMedia($name, $link)
{
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];


  $stmt = $db->prepare("INSERT INTO socialMedia (name, link) VALUES (?,?)");
  $stmt->bind_param("ss", $name, $link);

  if ($stmt->execute()) {
    $response["message"] = "Red social añadida";
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