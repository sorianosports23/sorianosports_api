<?php
  
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  include_once "../utils/auth/newsauth.php";

  echo json_encode($response);
?>