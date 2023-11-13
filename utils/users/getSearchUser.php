<?php
  include_once "../database/connection.php";

  function getSearchUser($username){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("SELECT username, fullname, email, age, ci, phone FROM users WHERE username = ?");
    $stmt->bind_param('s', $username);

    if($stmt->execute()){
      $result = $stmt->get_result();
      $user = $result->fetch_assoc();
      $response["data"] = $user;
      $response["status"] = true;
      $db->close();
      return $response;
    }
    else{
      $response["messege"] = "No se encontro el usuario o no existe, porfavor revise su entrada";
   
      $db->close();
      return $response;
    }
  }
?>