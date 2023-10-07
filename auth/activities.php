<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Headers: Content-Type");
  header("Access-Control-Allow-Origin: *");

  echo json_encode($response);
   
?>