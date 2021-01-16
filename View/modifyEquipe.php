<?php
include('../Model/read.php');
$jeux = RecupJeux();
$id = $_GET['id'];
$joueurs = RecupJoueursParEquipe($id);
$equipe = RecupEquipeById($id);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  	<link rel="stylesheet" type="text/css" href="../Ressources/CSS/reset.css">
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../Ressources/CSS/styles.css">
	<title>E-games</title>
</head>
<body>
	<div class="container">
		<?php include('Include/nav.php'); ?>
		<div>
			<p id="error">	<?php 

								if(isset($_GET['jn'])){
									echo "Joueur ".(string)$_GET['jn'].": ";
								}

								if(isset($_GET['error'])){
									switch($_GET['error']){
										case 'error-1':
											echo "Veuillez remplir tous les champs.";
											break;
										case 'error-2':
											echo "Nom d'equipe déjà existant.";
											break;
										case 'error-3':
											echo "Veuillez introduire nom / prénom valide. Les chiffres ne sont pas authorisées.";
											break;
										case 'error-4':
											echo "Le nom / prénom ne peut pas contenir de symboles.";
											break;
										case 'error-5':
											echo "La date entrée n'est pas valide.";
											break;
										case 'error-6':
											echo "Que les participants de plus de 12 ans peuvent s'inscrire.";
											break;
										case 'error-7':
											echo "Veuillez introduire un e-mail correcte.";
											break;
										case 'error-8':
											echo "E-mail déjà existant.";
											break;
										case 'error-9':
											echo "Veuillez introduire des pseudos valide. Les symboles et caractères spéciaux ne sont pas authorisées.";
											break;
										case 'error-10':
											echo "Pseudo déjà utilisé";
											break;


										};
								}
							?>
			</p>
					
			<form action="../Controller/modifyEquipe-controller.php" method="POST" style="width: 100%;">
				<label for="team">Équipe:</label>
				<br>
				<input type="text" name="team" value="<?php echo $equipe['nom'];?>">
				<br>
				<label for="jeu">Jeu:</label>
				<br>
				<select name="fk_jeu">
					<?php foreach($jeux as $jeu){?>
					 <option value="<?php echo $jeu['id']; ?>"<?php if($equipe['fk_jeu']==$jeu['id']){echo "selected";}?>><?php echo htmlspecialchars($jeu['nom']); ?></option>
				<?php } ?>
				</select>
				<br>
				<div class="col-2 form-col">
					<label for="nom1">Nom jouer 1:</label>
					<br>
					<input type="text" name="nom1" value="<?php echo $joueurs[0]['nom']?>">
					<br>
					<label for="prenom1">Prénom joueur 1:</label>
					<br>
					<input type="text" name="prenom1" value="<?php echo $joueurs[0]['prenom']?>">
					<br>
					<label for="dateNaissance1">Date de naissance joueur 1:</label>
					<br>
					<input type="date" name="dateNaissance1" value="<?php echo $joueurs[0]['dateNaissance']?>">
					<br>
					<label for="email1">E-mail joueur 1:</label>
					<br>
					<input type="email" name="email1" value="<?php echo $joueurs[0]['email']?>">
					<br>
					<label for="pseudo1">Pseudo joueur 1:</label>
					<br>
					<input type="text" name="pseudo1" value="<?php echo $joueurs[0]['pseudo']?>">
					<br>
				</div>
				<div class="col-2 form-col">
					<label for="nom2">Nom jouer 2:</label>
					<br>
					<input type="text" name="nom2" value="<?php echo $joueurs[1]['nom']?>">
					<br>
					<label for="prenom2">Prénom joueur 2:</label>
					<br>
					<input type="text" name="prenom2" value="<?php echo $joueurs[1]['prenom']?>">
					<br>
					<label for="dateNaissance2">Date de naissance joueur 2:</label>
					<br>
					<input type="date" name="dateNaissance2" value="<?php echo $joueurs[1]['dateNaissance']?>">
					<br>
					<label for="email2">E-mail joueur 2:</label>
					<br>
					<input type="email" name="email2" value="<?php echo $joueurs[1]['email']?>">
					<br>
					<label for="pseudo2">Pseudo joueur 2:</label>
					<br>
					<input type="text" name="pseudo2" value="<?php echo $joueurs[1]['pseudo']?>">
					<br>
				</div>
				<div class="col-2 form-col">
					<label for="nom3">Nom jouer 3:</label>
					<br>
					<input type="text" name="nom3" value="<?php echo $joueurs[2]['nom']?>">
					<br>
					<label for="prenom3">Prénom joueur 3:</label>
					<br>
					<input type="text" name="prenom3" value="<?php echo $joueurs[2]['prenom']?>">
					<br>
					<label for="dateNaissance3">Date de naissance joueur 3:</label>
					<br>
					<input type="date" name="dateNaissance3" value="<?php echo $joueurs[2]['dateNaissance']?>">
					<br>
					<label for="email3">E-mail joueur 3:</label>
					<br>
					<input type="email" name="email3" value="<?php echo $joueurs[2]['email']?>">
					<br>
					<label for="pseudo3">Pseudo joueur 3:</label>
					<br>
					<input type="text" name="pseudo3" value="<?php echo $joueurs[2]['pseudo']?>">
					<br>
				</div>
				<div class="col-2 form-col">
					<label for="nom4">Nom jouer 4:</label>
					<br>
					<input type="text" name="nom4" value="<?php echo $joueurs[3]['nom']?>">
					<br>
					<label for="prenom4">Prénom joueur 4:</label>
					<br>
					<input type="text" name="prenom4" value="<?php echo $joueurs[3]['prenom']?>">
					<br>
					<label for="dateNaissance4">Date de naissance joueur 4:</label>
					<br>
					<input type="date" name="dateNaissance4" value="<?php echo $joueurs[3]['dateNaissance']?>">
					<br>
					<label for="email4">E-mail joueur 4:</label>
					<br>
					<input type="email" name="email4" value="<?php echo $joueurs[3]['email']?>">
					<br>
					<label for="pseudo4">Pseudo joueur 4:</label>
					<br>
					<input type="text" name="pseudo4" value="<?php echo $joueurs[3]['pseudo']?>">
					<br>
				</div>
				<div class="col-2 form-col">
					<label for="nom5">Nom jouer 5:</label>
					<br>
					<input type="text" name="nom5" value="<?php echo $joueurs[4]['nom']?>">
					<br>
					<label for="prenom5">Prénom joueur 5:</label>
					<br>
					<input type="text" name="prenom5" value="<?php echo $joueurs[4]['prenom']?>">
					<br>
					<label for="dateNaissance5">Date de naissance joueur 5:</label>
					<br>
					<input type="date" name="dateNaissance5" value="<?php echo $joueurs[4]['dateNaissance']?>">
					<br>
					<label for="email5">E-mail joueur 5:</label>
					<br>
					<input type="email" name="email5" value="<?php echo $joueurs[4]['email']?>">
					<br>
					<label for="pseudo5">Pseudo joueur 5:</label>
					<br>
					<input type="text" name="pseudo5" value="<?php echo $joueurs[4]['pseudo']?>">
					<br>
				</div>
				<input type="hidden" name="id1" value="<?php echo $joueurs[0]['id']?>">
				<input type="hidden" name="id2" value="<?php echo $joueurs[1]['id']?>">
				<input type="hidden" name="id3" value="<?php echo $joueurs[2]['id']?>">
				<input type="hidden" name="id4" value="<?php echo $joueurs[3]['id']?>">
				<input type="hidden" name="id5" value="<?php echo $joueurs[4]['id']?>">
				<input type="hidden" name="id_equipe" value="<?php echo $id?>">
				

				
				<br><br>
				<input type="submit" value="Submit">
				<a href="admin.php">Cancel</a>
			</form>
		</div>
	</div>
</body>
</html>