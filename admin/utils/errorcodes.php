<?php
$codes = [
  1062 => "Ya existe un usuario con ese nombre, intente con otro",

];

function getMessageError($codes) {
  if($codes[$codes]){
    return $codes[$codes];
  }
  else
  return "Ocurrio un error inesperado";
}
?>