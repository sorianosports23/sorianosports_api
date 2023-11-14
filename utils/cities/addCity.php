<?php
 
  include_once "../database/connection.php";
  include_once "../utils/errorcodes.php";

  function addCityPlace($nameCity, $nameSport, $typeSport){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("INSERT INTO cityPlace(nameCity, nameSport, typeSport) VALUES(?,?,?)");
    $stmt->bind_param('sss', $nameCity, $nameSport, $typeSport);

    //consulta preparada esta consulta es util para prevenir inyeccion de SQL y mejora la
    //seguridad de nuestro código

    //La función bind_param en PHP se utiliza en el contexto de 
    //consultas preparadas para vincular parámetros a valores.

    if ($stmt->execute()) {
      $response["message"] = "Ciudad añadida";
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