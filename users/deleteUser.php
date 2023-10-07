<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

if($_SERVER["REQUEST_METHOD"] === "DELETE"){
  include_once "../utils/deleteuser.php";

  $DATA = json_decode(file_get_contents("php://input", true), true);

  if (empty($DATA["username"])) {
    $result=["message"] = "You have not entered any user";
    echo json_encode($result);
    $db->close();
    return;
  }

  echo json_encode(deleteUser($DATA["username"]));
} else{
  echo json_encode([
    "message" => "Wrong method for request";
    "correct_method" => "DELETE";
  ]);
}
?>