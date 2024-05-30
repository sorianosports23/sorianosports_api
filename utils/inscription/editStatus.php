<?php
include_once "../database/connection.php";

function editStatus($id, $status, $username)
{
  global $db;

  if (!empty($username)) {
    include_once "../utils/inscription/getInscriptionID.php";
    $inscription = getInscription($id);
    if ($inscription["data"]["username"] != $username) {
      $response = [
        "status" => false,
        "authorization" => false,
        "message" => "No estas autorizado para editar la inscripcion"
      ];
      echo json_encode($response);
      die();
    }
  }

  $query = "UPDATE inscriptionform SET state = :state WHERE id = :id";
  $stmt = $db->prepare($query);
  $stmt->bindParam('state', $status, PDO::PARAM_INT);
  $stmt->bindParam('id', $id);

  $response = [
    "status" => false,
    "message" => ""
  ];

  if ($stmt->execute()) {
    $response["status"] = true;

    date_default_timezone_set('America/Montevideo');
    $date = date('Y/m/d');

    if ($status == "2") {
      $db->prepare("UPDATE inscriptionform SET startinscription = '$date' WHERE id = $id")->execute();
    } else if ($status == "3") {
      $db->prepare("UPDATE inscriptionform SET endinscription = '$date' WHERE id = $id")->execute();
    }

    return $response;
  } else {
    $response["message"] = "No se pudo realizar la inscripcion";
    return $response;
  }
}