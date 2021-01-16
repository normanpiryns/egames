<?php

function checkNumber($elem){
  if(preg_match("/[0-9]/", $elem)===0) {
    return true;
  }
}

function checkNumber2($elem){
  return (preg_match("#[0-9]#",$elem)) ? true : false;
}
function checkLettre($elem){
  return (preg_match('/#[a-z]#/', $elem) || preg_match('#[A-Z]#', $elem)) ? true : false;
}
function checkUpcase($elem){
  if(preg_match("/[A-Z]/", $elem)===0) {
    return true;
  }
}

function checkFormatMail($elem){
  return (preg_match('#^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$#', $elem)) ? true : false ;
}

function checkEmptyArray($post){
  foreach($post as $val){
    if (empty($val)) return true;
  }
}


function checkTrimArray($post){
  foreach($post as $key => $elem){
    $_POST[$key] = trim($elem);
  }
}

function htmlSpecialArray($post){
  foreach($post as $key => $elem){
    $_POST[$key] = htmlspecialchars($elem);
  }
}

function calculAge($birthDate){
  $date = new DateTime($birthDate);
  $now = new DateTime();
  if($now > $date){
    $age = $now->diff($date);
    return $age->y;
  } else {
    return false;
  }
  
}
function validateEmail($email){
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return true;
  }
}

function checkSymbol($pseudo){
  if(!preg_match("/^[a-zA-Z0-9ÁÀÂÉÈÊÍÌÎÚÙÛáàâîíìêéèóòôúùûç-]*$/", $pseudo)){
    return true;
  } 
}

?>
