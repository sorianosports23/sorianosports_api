<?php
  $key = "ce5188e2205a673ab644937e2639addb0fa16f10dded4cc666b509a4297bad08";
  $method = "AES-256-CBC";
  $ivKey = "cefb1e040e7a7bdce437baf6a73c7267"; //generado con random_bytes(16) y guardado con bin2hex()
  $iv = hex2bin($ivKey);

  function encryptData($data) {
    global $key;
    global $method;
    global $iv;

    $dataSerialized = Serialize($data);
    $dataEncrypted = openssl_encrypt($dataSerialized, $method, $key, 0, $iv);
    return $dataEncrypted;
  }

  function decryptData($data) {
    global $key;
    global $method;
    global $iv;
  
    $dataDecrypted = openssl_decrypt($data, $method, $key, 0, $iv);
    $dataUnserialized = unserialize($dataDecrypted);
    
    return $dataUnserialized;
  }
?>