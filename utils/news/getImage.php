<?php
  header("Access-Control-Allow-Origin: *");

  include_once "../utils/news/getImage.php";

  $info = getImage($_GET["news"], $_GET["pos"]);

  $content_type = "Content-Type: " . $info["type"];

  header($content_type);

  $img = unserialize($info["img"]);

  echo $img;
?>