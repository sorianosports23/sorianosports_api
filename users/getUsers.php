<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json");
  header("Access-Control-Allow-Headers: Authorization");

  include_once "../auth/admin.php";
  
  if ($_SERVER["REQUEST_METHOD"] === "GET") {
    include_once "../utils/getusers.php";

    // inicia la variable $pag en 0
    $pag = 0;

    if (!empty($_GET["pag"])) {
      // si mando la variable $pag desde los parametros la remplaza con el valor -1 pq el arreglo empieza en 0 (si quiere ver la pagina 1, en el arreglo es 0)
      $pag = $_GET["pag"] - 1;
    }

    echo json_encode(getUsers($pag)); //manda la info desde la funcion getUsers (/utils/getusers.php)
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "GET"
    ]);
  }

?>