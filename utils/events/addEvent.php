<?php
include_once "../database/connection.php";
include_once "../utils/errorcodes.php";

function addEvent($name, $image, $city, $place, $time, $sport, $rules, $inscriptionInfo, $extraInfo, $description, $date_ev, $urlUbi, $check_Great)
{
	global $db;

	$response = [
		"message" => "",
		"status" => false
	];

	$stmt = $db->prepare("
		INSERT INTO event (name, image, imgType, city, place, time, sport, rules, inscriptionInfo, extraInfo, description, date_ev, urlUbi, check_Great) 
		VALUES (:name, :img, :imgtype, :city, :place, :time, :sport, :rules, :inscinfo, :extrainfo, :description, :dateev, :urlubi, :great)"
	);

	$serializedImage = file_get_contents($image["tmp_name"]);
	$stmt->bindParam("name", $name);
	$stmt->bindParam("img", $serializedImage, PDO::PARAM_LOB);
	$stmt->bindParam("imgtype", $image['type']);
	$stmt->bindParam("city", $city);
	$stmt->bindParam("place", $place);
	$stmt->bindParam("time", $time);
	$stmt->bindParam("sport", $sport);
	$stmt->bindParam("rules", $rules);
	$stmt->bindParam("inscinfo", $inscriptionInfo);
	$stmt->bindParam("extrainfo", $extraInfo);
	$stmt->bindParam("description", $description);
	$stmt->bindParam("dateev", $date_ev);
	$stmt->bindParam("urlubi", $urlUbi);
	$stmt->bindParam("great", $check_Great);

	if ($stmt->execute() > 0) {
		$response["message"] = "Evento añadido";
		$response["status"] = true;
		return $response;
	} else {
		$response["message"] = "No se pudo añadir el evento";
		return $response;
	}
}