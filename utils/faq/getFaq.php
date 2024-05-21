<?php
include_once "../database/connection.php";

function getFaq()
{
  global $db;

  $sql = "SELECT * FROM faq";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();

  $response = ["status" => false];

  $faq = [];

  foreach ($result as $row) {
    array_push($faq, $row);
  }

  $response["status"] = true;
  $response["data"] = $faq;
  return $response;
}