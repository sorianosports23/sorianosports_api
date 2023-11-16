<?php
  header("Access-Control-Allow-Headers: *");
  header("Access-Control-Allow-Origin: *");

  echo json_encode($_POST)
?>