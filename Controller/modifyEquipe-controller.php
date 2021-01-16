<?php
	include("functions.php");
	include("../Model/edit.php");
	include("../Model/read.php");

	//Récuperer les données des joueurs
	for($i=1;$i<=5;$i++){
		$joueur[$i] = RecupJoueurById($_POST['id'.$i]); 
	}


	//Récuperer l'id de l'équipe
	$team = RecupEquipeById($_POST['id_equipe']);

	//Sanitizing
	htmlSpecialArray($_POST);
	checkTrimArray($_POST);

	// Vérification si les champs sont vides
	if (checkEmptyArray($_POST)) {
	 	throwError('error-1',null);
	}
	// Vérification si le nom d'équipe est libre
	$noms_equipes = RecupNomsEquipesByGame($_POST['fk_jeu']);
	foreach($noms_equipes as $nom_equipe){
		if ($nom_equipe['nom'] == $_POST['team'] && $_POST['team'] != $team['nom']){
			throwError('error-2',null);
		}
	}

	// Vérifications si les champs du nom ou prénom ont un nombre
	for($i=1;$i<=5;$i++){
		if(checkNumber2($_POST['nom'.$i]) || checkNumber2($_POST['prenom'.$i])){
			throwError('error-3',$i);
		}
	}

	// Vérifications si les champs du nom ou prénom ont un symbole
	for($i=1;$i<=5;$i++){
		if(checkSymbol($_POST['nom'.$i]) || checkSymbol($_POST['prenom'.$i])){
			throwError('error-4',$i);
		}
	}

	// Transformation nom/prénom => Nom/Prenom
	for($i=1;$i<=5;$i++){
		$_POST['nom'.$i]=ucfirst(strtolower($_POST['nom'.$i]));
		$_POST['prenom'.$i]=ucfirst(strtolower($_POST['prenom'.$i]));

	}
	
	//Vérification de la validité des dates
	for($i=1;$i<=5;$i++){
		if (calculAge($_POST['dateNaissance'.$i])){
		$_POST["age".$i] = calculAge($_POST['dateNaissance'.$i]);
		} else {
		throwError("error-5",$i);
		}
	}
	//Vérification de l'âge des joueurs
	for($i=1;$i<=5;$i++){
		if($_POST["age".$i] < 12){
		 throwError('error-6',$i); 
		}
	}

	// Vérification de la validite des e-mails
	for($i=1;$i<=5;$i++){
		if(!validateEmail($_POST['email'.$i])){
		 throwError('error-7',$i); 
		}
	}

	//Vérification si les e-mails sont déjà utilisés
	$emails = RecupEmails();
	$formEmails = array();
	array_push($formEmails, $_POST['email1'], $_POST['email2'], $_POST['email3'], $_POST['email4'], $_POST['email5']);
	$uniqueFormEmails = array_unique($formEmails);
	if (count($formEmails) != count($uniqueFormEmails)){
		throwError('error-7',null);
	}
	foreach($emails as $email){
		for($i=1;$i<=5;$i++){
			if($email['email'] == $_POST['email'.$i] and $_POST['email'.$i] != $joueur[$i]['email'] ){
		 		throwError('error-8',$i); 
			}
		}
	}

	//Vérification contre les symboles dans les pseudos
	for($i=1;$i<=5;$i++){
		if(checkSymbol($_POST['pseudo'.$i])){
		 	throwError('error-9',$i); 
		}
	}


	//Vérification si les pseudos sont déjà utilisés
	$pseudos = RecupPseudosByGame($_POST['fk_jeu']);
	$formPseudos = array();
	array_push($formPseudos, $_POST['pseudo1'], $_POST['pseudo2'], $_POST['pseudo3'], $_POST['pseudo4'], $_POST['pseudo5']);
	$uniqueFormPseudos = array_unique($formPseudos);
	if (count($formPseudos) != count($uniqueFormPseudos)) {
		throwError('error-10',null);
	}
	foreach($pseudos as $pseudo){
		for($i=1;$i<=5;$i++){
			if ($pseudo['pseudo'] == $_POST['pseudo'.$i] and $_POST['pseudo'.$i] != $joueur[$i]['pseudo']){
			throwError('error-10',$i);
			}
		}
	}
	
 	// Modification du nom de l'equipe et du jeu 
 	editEquipe($_POST['id_equipe'],$_POST['team'],$_POST['fk_jeu']);
 	// Modification des joueurs.
 	editJoueursEnEquipe($_POST);
 	header("Location: ../View/admin.php?success=3");


	//Envoie l'erreur à la vue
	function throwError($error_number, $joueur_num){
		 if ($joueur_num == null) {
		 	header("Location: ../View/modifyEquipe.php?error=".$error_number."&id=".$_POST['id_equipe']);
		 	die();
		 } else {
		 	header("Location: ../View/modifyEquipe.php?error=".$error_number."&jn=".(string)$joueur_num."&id=".$_POST['id_equipe']);
		 	die();
		 }
		 
	}
?>