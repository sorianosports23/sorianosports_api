<?php
  $username = "root";
  $password = "";
  $server = "localhost";
  $dataBase = "apiSPT";

  $db = new mysqli($server, $username, $password, $dataBase);

  if($db->connect_error){
    header("Content-Type: application/json");
    $response = [
      "status" => false,
      "message" => "No se pudo realizar la conexión con la base de datos"  
    ];
    echo json_encode($response);
    die();
  }
?>