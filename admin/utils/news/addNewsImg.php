<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");

  include_once "../utils/news/addNewsImg.php";

  $images = $_FILES;
  $imgPos = json_decode($_POST["imagesPos"]);
  $news = $_POST["news_id"];

  echo json_encode(addNewsImg($images, $imgPos, $news));
?>