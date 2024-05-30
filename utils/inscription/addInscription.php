<?php

include_once "../database/connection.php";
include_once "../utils/errorcodes.php";

function addInscription(
  $username = '',
  $name = '',
  $lastname = '',
  $birthday = '1900-01-01',
  $ci = 0,
  $imageCI = null,
  $gender = false,
  $medicalRecord = false,
  $expiration = '1900-01-01',
  $city = '',
  $residence = '',
  $phone = 0,
  $email = '',
  $schoolYear = '',
  $alternativePhone = 0,
  $sportTimeStart = '00:00:00',
  $sportTimeEnd = '00:00:00',
  $activity = '',
  $activityPlace = '',
  $anotherSports = '',
  $oldPractisedSport = '',
  $medicalAssitence = '',
  $whatMedicalCare = '',
  $medicalAssitencePhone = 0,
  $bloodGroup = '',
  $diabetes = false,
  $hypertension = false,
  $fractures = false,
  $allergy = false,
  $asthma = false,
  $otherDiseases = '',
  $wearGlasses = false,
  $whatTypeGlasses = '',
  $state = 0,
  $imageMedicalRecord = null
) {
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];

  $stmt = $db->prepare("
      INSERT INTO inscriptionForm 
      (username, name, lastname, birthday, ci, gender, medicalRecord, expiration, city, residence, phone, email, schoolYear, alternativePhone, sportTimeStart, sportTimeEnd, activity, activityPlace, anotherSports, oldPractisedSport, medicalAssistence, whatMedicalCare, medicalAssistencePhone, bloodGroup, diabetes, hypertension, fractures, allergy, asthma, otherDiseases, wearGlasses, whatTypeGlasses, state, ciImage, ciImgType, medicalRecordImg, medicalRecordImgType) 
      VALUES (:username,:name,:lastname,:birthday,:ci,:gender,:medicalrecord,:expiration,:city,:residence,:phone,:email,:schoolyear,:alternativephone,:sporttimestart,:sporttimeend,:activity,:activityplace,:anothersports,:oldpractisedsport,:medicalassistence,:whatmedicalcare,:medicalassistencephone,:bloodgroup,:diabetes,:hypertension,:fractures,:allergy,:asthma,:otherdiseases,:wearglasses,:whattypeglasses,:state,:ciimage,:ciimgtype,:medicalrecordimg,:medicalrecordimgtype)
    ");

  $serializedImageCi = null;
  $serializedImageMR = null;

  $ciImgType = null;
  $mrImgType = null;

  if (!is_null($imageCI)) {
    $serializedImageCi = file_get_contents($imageCI["tmp_name"]);
    $ciImgType = $imageCI["type"];
    $stmt->bindParam('ciimage', $serializedImageCi, PDO::PARAM_LOB);
    $stmt->bindParam('ciimgtype', $ciImgType);
  } else {
    $ci_temp = null;
    $ci_type_temp = '';
    $stmt->bindParam('ciimage', $ci_temp, PDO::PARAM_NULL);
    $stmt->bindParam('ciimgtype', $ci_type_temp);
  }

  if (!is_null($imageMedicalRecord)) {
    $serializedImageMR = file_get_contents($imageMedicalRecord["tmp_name"]);
    $mrImgType = $imageMedicalRecord["type"];
    $stmt->bindParam('medicalrecordimg', $serializedImageMR, PDO::PARAM_LOB);
    $stmt->bindParam('medicalrecordimgtype', $mrImgType);
  } else {
    $ci_temp = null;
    $ci_type_temp = '';
    $stmt->bindParam('medicalrecordimg', $ci_temp, PDO::PARAM_NULL);
    $stmt->bindParam('medicalrecordimgtype', $ci_type_temp);
  }

  $stmt->bindParam('username', $username);
  $stmt->bindParam('name', $name);
  $stmt->bindParam('lastname', $lastname);
  $stmt->bindParam('birthday', $birthday);
  $stmt->bindParam('ci', $ci);
  $stmt->bindParam('gender', $gender);
  $stmt->bindParam('medicalrecord', $medicalRecord);
  $stmt->bindParam('expiration', $expiration);
  $stmt->bindParam('city', $city);
  $stmt->bindParam('residence', $residence);
  $stmt->bindParam('phone', $phone);
  $stmt->bindParam('email', $email);
  $stmt->bindParam('schoolyear', $schoolYear);
  $stmt->bindParam('alternativephone', $alternativePhone);
  $stmt->bindParam('sporttimestart', $sportTimeStart);
  $stmt->bindParam('sporttimeend', $sportTimeEnd);
  $stmt->bindParam('activity', $activity);
  $stmt->bindParam('activityplace', $activityPlace);
  $stmt->bindParam('anothersports', $anotherSports);
  $stmt->bindParam('oldpractisedsport', $oldPractisedSport);
  $stmt->bindParam('medicalassistence', $medicalAssitence);
  $stmt->bindParam('medicalassistencephone', $medicalAssitencePhone);
  $stmt->bindParam('whatmedicalcare', $whatMedicalCare);
  $stmt->bindParam('bloodgroup', $bloodGroup);
  $stmt->bindParam('diabetes', $diabetes);
  $stmt->bindParam('hypertension', $hypertension);
  $stmt->bindParam('fractures', $fractures);
  $stmt->bindParam('allergy', $allergy);
  $stmt->bindParam('asthma', $asthma);
  $stmt->bindParam('otherdiseases', $otherDiseases);
  $stmt->bindParam('wearglasses', $wearGlasses);
  $stmt->bindParam('whattypeglasses', $whatTypeGlasses);
  $stmt->bindParam('state', $state);

  if ($stmt->execute() > 0) {
    $response["message"] = "Se mando la solicitud correctamente";
    $response["status"] = true;
    return $response;
  } else {
    $response["message"] = "Ocurrio un error al mandar la solicitud, porfavor contactese con el equipo para solucionarlo";
    return $response;
  }
}