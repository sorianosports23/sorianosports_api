<?php
include_once "../database/connection.php";

function getMessages($username)
{
  global $db;

  $query = "SELECT * FROM contact WHERE username = :username";
  $stmt = $db->prepare($query);
  $stmt->bindParam(":username", $username);

  $response = [
    "status" => false,
  ];

  $messages = [];

  $stmt->execute();

  $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($res as $message) {
    array_push($messages, $message);
  }

  $response["status"] = true;
  $response["data"] = $messages;
  return $response;
}