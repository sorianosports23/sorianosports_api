<?php
include_once "../database/connection.php";

function getMessageForUser($id) {
    global $db;

    $resultData = [
        "status" => false,
        "data" => null
    ];

    $sql = "SELECT message FROM messageForUser WHERE id = $id";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
      
        $idMessage = $result->fetch_assoc();
        $resultData["data"] = $idMessage;
        $resultData["status"] = true;
    } else {
        $resultData["message"] = "No se encontró ningún mensaje para el usuario con ID: $id";
    }

    $db->close();

    return $resultData;
}