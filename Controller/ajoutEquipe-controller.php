<?php

include("functions.php");
include("../Model/insert.php");
include("../Model/read.php");


//Sanitizing
htmlSpecialArray($_POST);
checkTrimArray($_POST);

//Envoie l'erreur à la vue
function throwError($error_number){
	 header("Location: ../View/ajoutEquipe.php?error=".$error_number);
	 die();
}
//Check si vide
if (checkEmptyArray($_POST)) {
	 	throwError('error-1');
}

// Vérification si le nom d'équipe est libre
$noms_equipes = RecupNomsEquipesByGame($_POST['fk_jeu']);
foreach($noms_equipes as $nom_equipe){
	if ($nom_equipe['nom'] == $_POST['team']){
		throwError('error-2');
	}
}
//Check contre les symboles
if (checkSymbol($_POST['team'])) {
		throwError('error-3');
	}
//Inserer une équipe
insertEquipe($_POST['team'],$_POST['fk_jeu']);
header("Location: /egames/View/admin.php?success=1");
?>