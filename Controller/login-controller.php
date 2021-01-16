<?php 
session_start();
include("functions.php");
include("../Model/read.php");

function throwError($error_number){
	header("Location: ../View/login.php?error=".$error_number);
	die();
}

//Sanitizing POST
htmlSpecialArray($_POST);
checkTrimArray($_POST);

//Récuperation des données dans la DB
var_dump($loginInfo = RecupLoginInfo($_POST['login']));
$loginDB=$loginInfo['login'];
$passDB=$loginInfo['mdp'];



if (checkEmptyArray($_POST)) {
	throwError('error-1');
}

if(verifyLogin($_POST['login'], $_POST['mdp'], $passDB, $loginDB) == 'OK'){
   $_SESSION['logged'] = 1;
   header("Location: /egames/View/admin.php");
}else{
   throwError("error-4");
}

function verifyLogin($login, $password, $passDB, $loginDB){
  
    if($login !== $loginDB){
     	throwError("error-2");
    }elseif(!password_verify($password, $passDB)){
		throwError("error-3");
    } else {
    	return "OK";
    }
}

?>