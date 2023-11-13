<?php
  include_once "../utils/userauth.php";
  include_once "../database/connection.php";

  $query = "SELECT * FROM permissions WHERE username = '$username' AND permission = 'news'";

  $result = $db->query($query);

  if ($result->num_rows === 0) {
    $response["authorization"] = false;
    $response["message"] = "No tienes permiso para editar las noticias";
    echo json_encode($response);
    die();
  }
?>