<?php 
	include("functions.php");
	include("../Model/edit.php");
	include("../Model/read.php");

	$joueur = RecupJoueurById($_POST['id']);

	//Sanitizing
	htmlSpecialArray($_POST);
	checkTrimArray($_POST);

	// Vérification si les champs sont vides
	if (checkEmptyArray($_POST)) {
	 	throwError('error-1');
	}
	// Vérifications si les champs du nom ou prénom ont un nombre
	if(checkNumber2($_POST['nom']) || checkNumber2($_POST['prenom'])){
		 throwError('error-2');
	}
	//Verification de symboles dans nom/prenom
	if (checkSymbol($_POST['nom']) || checkSymbol($_POST['prenom'])) {
		throwError('error-3');
	}
	// Transformation nom/prénom => Nom/Prenom
	$_POST['nom']=ucfirst(strtolower($_POST['nom']));
	$_POST['prenom']=ucfirst(strtolower($_POST['prenom']));
	// Vérification de la date
	if (calculAge($_POST['dateNaissance'])){
		$_POST["age"] = calculAge($_POST['dateNaissance']);
	} else {
		throwError("error-4");
	}
	//Vérification de l'âge du joueur
	if($_POST["age"] < 12){
		 throwError('error-5'); 
	}
	// Vérification de la validite du e-mail
	if(!validateEmail($_POST['email'])){
		 throwError('error-6');
	}

	//Vérification si e-mail déjà utilisé
	$emails = RecupEmails();
	foreach($emails as $email){
		if ($email['email'] == $_POST['email'] and $_POST['email'] != $joueur['email']){
			throwError('error-7');
		}
	}
	//Vérification contre les symboles dans le pseudo
	if (checkSymbol($_POST['pseudo'])) {
		throwError('error-8');
	}

	// Vérification si le pseudo est libre
	$pseudos = RecupPseudosByGame($_POST['fk_jeu']);
	foreach ($pseudos as $pseudo) {
		if ($pseudo['pseudo'] == $_POST['pseudo'] and $_POST['pseudo'] != $joueur['pseudo']) {
			throwError("error-9");		
		}

	}

	
	//Insérer le joueur dans la DB et retour à la page d'acceuil
	editJoueur($_POST);
	header("Location: /egames/View/admin.php?success=2");


	//Envoie l'erreur à la vue
	function throwError($error_number){
		 header("Location: ../View/modifyJoueur.php?error=".$error_number.'&id='.$_POST['id']);
		 die();
	}
?>
