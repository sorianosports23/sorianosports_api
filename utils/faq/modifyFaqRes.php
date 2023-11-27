<?php
  include_once "../database/connection.php";

  function modifyFaqRes($faqID, $responseFaq, $newResponseFaq) {
    global $db;    

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("UPDATE city SET $responseFaq = ? WHERE id = ?");
    $stmt->bind_param('ii', $faqID, $newNameFaq);
    //stmt = "UPDATE city SET $city = ? WHERE id = ?;
    

    if ($stmt->execute()) {
      $response["message"] = "Respuesra de la FAQ editada";
      $response["status"] = true;
      $db->close();
      return $response;
    } else {
      // $errMessage = getMessageError($db->errno);
      $response["message"] = $stmt->error;
      $db->close();
      return $response;
    }
  }
?>