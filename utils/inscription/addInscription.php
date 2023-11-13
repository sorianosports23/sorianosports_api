<?php
 
  include_once "../database/connection.php";
  include_once "../utils/errorcodes.php";

  function addInscription($name, $lastname, $birthday, $ci, $imageCI, $gender, $medicalRecord, $expiration, $imageMedicalRecord, $city, $residence, $phone, $email, $schoolYear, $alternativePhone, $sportTimeStart, $sportTimeEnd, $activity, $activityPlace, $anotherSports, $oldPractisedSport, $medicalAssitence, $whatMedicalCare, $medicalAssitencePhone, $bloodGroup, $diabetes, $hypertension, $fractures, $allergy, $asthma, $otherDiseases, $wearGlasses, $whatTypeGlasses) {
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("INSERT INTO inscriptionForm (name, lastname, birthday, ci, gender, medicalRecord, expiration, city, residence, phone, email, schoolYear, alternativePhone, sportTimeStart, sportTimeEnd, activity, activityPlace, anotherSports, oldPractisedSport, medicalAssistence, whatMedicalCare, medicalAssistencePhone, bloodGroup, diabetes, hypertension, fractures, allergy, asthma, otherDiseases, wearGlasses, whatTypeGlasses) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $serializedImageCi = serialize(file_get_contents($imageCI["tmp_name"]));
    $serializedImageMR = serialize(file_get_contents($imageMedicalRecord["tmp_name"]));
    $stmt->bind_param("sssisisssssississssssssisiiiiisis", $name, $lastname, $birthday, $ci, $serializedImageCi, $gender, $medicalRecord, $expiration, $serializedImageMR , $city, $residence, $phone, $email, $schoolYear, $alternativePhone, $sportTimeStart, $sportTimeEnd, $activity, $activityPlace, $anotherSports, $oldPractisedSport, $medicalAssitence, $whatMedicalCare, $medicalAssitencePhone, $bloodGroup, $diabetes, $hypertension, $fractures, $allergy, $asthma, $otherDiseases, $wearGlasses, $whatTypeGlasses);

    if ($stmt->execute()) {
      $response["message"] = "Se mando correctamente";
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