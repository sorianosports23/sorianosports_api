<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");

  if ($_SERVER["REQUEST_METHOD"] === "GET") {
    include_once "../utils/contact/getcontactform.php";

    $pag = 0;

    if (isset($_GET["pag"])) {
      $pag = $_GET["pag"] - 1;
    }


    echo json_encode(getContact($pag));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "GET"
    ]);
  }
?>