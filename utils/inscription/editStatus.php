<?php
  include_once "../database/connection.php";

  function editStatus($id, $status) {
    global $db;

    $query = "UPDATE inscriptionform SET state = ? WHERE id = ?";
    $stmt = $db->prepare($query);

    $stmt->bind_param("ii", $status, $id);

    $response = [
      "status" => false,
      "message" => ""
    ];

    if ($stmt->execute()) {
      $response["status"] = true;

      date_default_timezone_set('America/Montevideo');
      $date = date('Y/m/d');

      if ($status == "2") {
        $db->query("UPDATE inscriptionform SET startInscription = '$date' WHERE id = $id");
      } else if ($status == "3") {
        $db->query("UPDATE inscriptionform SET endInscription = '$date' WHERE id = $id");
      }

      $db->close();
      return $response;
    } else {
      $response["message"] = "No se pudo realizar la inscripcion";
      $db->close();
      return $response;
    }
  }
?>