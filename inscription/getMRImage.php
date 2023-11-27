<?php
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");

  // include_once "../auth/admin.php";

  if ($_SERVER["REQUEST_METHOD"] === "GET") {
    include_once "../utils/inscription/getImageMR.php";

    if (empty($_GET["id"])) {
      echo json_encode([
        "status" => false,
        "message" => "No se ingreso el ID"
      ]);
      die();
    }

    $id = $_GET["id"];

    $resImage = getImage($id);

    if (!$resImage["status"]) {
      echo json_encode($resImage);
      die();
    }

    header("Content-Type: ". $resImage["type"]);

    echo unserialize($resImage["image"]);
  } else {
    echo json_encode([
      "message" => "Metodo incorrecto para la petición",
      "correct_method" => "GET"
    ]);
  }
?>