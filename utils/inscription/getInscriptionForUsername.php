<?php
  include_once "../database/connection.php";

  function getInscriptionForUsername($username){
    global $db;

    $response = [ 
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("SELECT id, name, lastname, birthday, ci, gender, medicalRecord, expiration, city, residence, phone, email, schoolYear, alternativePhone, sporTTimeStart, sportTimeEnd, activity, activityPlace, anotherSports, oldPractisedSport, medicalAssistence, whatMedicalCare, medicalAssistencePhone, bloodGroup, diabetes, hypertension, fractures, allergy, asthma, otherDiseases, wearGlasses, whatTypeGlasses, state FROM inscriptionForm WHERE username = ?");
    $stmt->bind_param('s', $username);

    $res = $stmt->execute();

    $inscription = [];

    if ($res) {
      $result = $stmt->get_result();
      while ($row = $result->fetch_assoc()) {
        array_push($inscription, $row);
      }
    }

    $response["status"] = true;
    $response["data"] = $inscription;
    $db->close();
    return $response;

 }
  
?>