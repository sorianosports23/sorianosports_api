<?php
  include_once "../database/connection.php";

  function getInscriptionForUsername($username){
    global $db;

    $response = [ 
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("SELECT * FROM inscriptionForm WHERE username = ?");
    $stmt->bind_param('s', $username);

    $res = $stmt->execute();

    $inscription = [];

    if ($res) {
      $result = $stmt->get_result();
      while ($row = $result->fetch_assoc()) {
        array_push($inscription, $row);
      }
    }

    $response["status"] = true;
    $response["data"] = $inscription;
    $db->close();
    return $response;

 }
  
?>