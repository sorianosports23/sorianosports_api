<?php

  function validationPass($password){
  
    $maxLong = 50; //Establece la cantidad maxima de caracteres
    $minLong = 8; //Establece la cantidad minima de caracteres

    $longitud = strlen($password);

    if($longitud < $minLong){
      return 1;
    }
    else if($longitud > $maxLong){
      return 2;
    }
    else{
      return 3;
    }

  }


?>