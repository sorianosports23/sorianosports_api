<?php
 
  include_once "../database/connection.php";
  include_once "../utils/errorcodes.php";

  function addInscription($name, $lastname, $birthday, $ci, $imageCI, $gender, $medicalRecord, $expiration, $city, $residence, $phone, $email, $schoolYear, $alternativePhone, $sportTimeStart, $sportTimeEnd, $activity, $activityPlace, $anotherSports, $oldPractisedSport, $medicalAssitence, $whatMedicalCare, $medicalAssitencePhone, $bloodGroup, $diabetes, $hypertension, $fractures, $allergy, $asthma, $otherDiseases, $wearGlasses, $whatTypeGlasses, $state, $imageMedicalRecord) {
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("INSERT INTO inscriptionForm (name, lastname, birthday, ci, gender, medicalRecord, expiration, city, residence, phone, email, schoolYear, alternativePhone, sportTimeStart, sportTimeEnd, activity, activityPlace, anotherSports, oldPractisedSport, medicalAssistence, whatMedicalCare, medicalAssistencePhone, bloodGroup, diabetes, hypertension, fractures, allergy, asthma, otherDiseases, wearGlasses, whatTypeGlasses, state, ciImage, ciImgType, medicalRecordImg, medicalRecordImgType) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $serializedImageCi = null;
    $serializedImageMR = null;

    $ciImgType = null;
    $mrImgType = null;

    if (!is_null($imageCI)) {
      $serializedImageCi = serialize(file_get_contents($imageCI["tmp_name"]));
      $ciImgType = $imageCI["type"];
    }

    if (!is_null($imageMedicalRecord)) {
      $serializedImageMR = serialize(file_get_contents($imageMedicalRecord["tmp_name"]));
      $mrImgType = $imageMedicalRecord["type"];
    }

    if (!$stmt) {
      die($db->error);
    }

    $stmt->bind_param("sssiiisssisiisssssssssssssssssssssss", $name, $lastname, $birthday, $ci, $gender, $medicalRecord, $expiration, $city, $residence, $phone, $email, $schoolYear, $alternativePhone, $sportTimeStart, $sportTimeEnd, $activity, $activityPlace, $anotherSports, $oldPractisedSport, $medicalAssitence, $whatMedicalCare, $medicalAssitencePhone, $bloodGroup, $diabetes, $hypertension, $fractures, $allergy, $asthma, $otherDiseases, $wearGlasses, $whatTypeGlasses, $state, $serializedImageCi, $ciImgType, $serializedImageMR, $mrImgType);


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