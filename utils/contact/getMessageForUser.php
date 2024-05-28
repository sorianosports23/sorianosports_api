<?php
include_once "../database/connection.php";

function getMessageForUser($id)
{
    global $db;

    $resultData = [
        "status" => false,
        "data" => null
    ];

    $sql = "SELECT message FROM messageForUser WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam("id", $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $resultData["data"] = $result['message'];
        $resultData["status"] = true;
    } else {
        $resultData["message"] = "No se recibio ningun mensaje";
    }
    return $resultData;
}