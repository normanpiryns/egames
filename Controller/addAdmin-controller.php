<?php

include("functions.php");
include("../Model/insert.php");
include("../Model/read.php");



//Sanitizing
htmlSpecialArray($_POST);
checkTrimArray($_POST);

//Envoie l'erreur au JS
function throwError($error_number){
	 die(json_encode('error-'.$error_number));
	
}
//Check si vide
if (checkEmptyArray($_POST)) {
	 	throwError(1);
}

// Vérification si le nom d'admin est libre
$admins = RecupListeAdmins();
foreach($admins as $admin){
	if ($admin['login'] == $_POST['login']){
		throwError(2);
	}
}
//Check contre les symboles
if (checkSymbol($_POST['login'])) {
		throwError(3);
	}

//Validate password

if (checkUpcase($_POST['mdp'])){
	throwError(4);
}
if (!checkNumber2($_POST['mdp'])) {
	throwError(5);
}

$_POST['mdp'] = password_hash($_POST['mdp'], PASSWORD_BCRYPT);

insertAdmin($_POST);
echo json_encode("Success");
?>