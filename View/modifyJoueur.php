<?php
include('../Model/read.php');
$jeux = RecupJeux();
$id = (int)$_GET['id'];
$joueur = RecupJoueurById($id);


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
			<p id="error">	<?php if(isset($_GET['error'])){
									switch($_GET['error']){
										case 'error-1':
											echo "Veuillez remplir tous les champs.";
											break;
										case 'error-2':
											echo "Veuillez introduire un nom / prénom valide. Les chiffres ne sont pas authorisées.";
											break;
										case 'error-3':
											echo "Le nom/prénom ne peut pas contenir de symboles.";
											break;
										case 'error-4':
											echo "Date invalide. Veuillez introduire une date correcte.";
											break;
										case 'error-5':
											echo "Vous devez avoir plus de 12 ans pour vous inscrire.";
											break;
										case 'error-6':
											echo "Veuillez introduire un e-mail correcte.";
											break;
										case 'error-7':
											echo "E-mail déjà utilisé.";
											break;
										case 'error-8':
											echo "Veuillez introduire un pseudo valide. Les symboles et caractères spéciaux ne sont pas authorisées.";
											break;
										case 'error-9':
											echo "Le pseudo est déjà utilisé.";
											break;

										};
								}
							?>
			</p>
					
			<form action="../Controller/modifyJoueur-controller.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $id ?>">
				<label for="nom">Nom:</label>
				<br>
				<input type="text" name="nom" value="<?php echo $joueur['nom'] ?>">
				<br>
				<label for="prenom">Prénom:</label>
				<br>
				<input type="text" name="prenom" value="<?php echo $joueur['prenom'] ?>">
				<br>
				<label for="dateNaissance">Date de naissance:</label>
				<br>
				<input type="date" name="dateNaissance" value="<?php echo $joueur['dateNaissance'] ?>">
				<br>
				<label for="email">E-mail:</label>
				<br>
				<input type="email" name="email" value="<?php echo $joueur['email'] ?>">
				<br>
				<label for="pseudo">Pseudo:</label>
				<br>
				<input type="text" name="pseudo" value="<?php echo $joueur['pseudo'] ?>">
				<br>
				<label for="fk_jeu">Jeu:</label>
				<br>
				<select name="fk_jeu">
					<?php foreach($jeux as $jeu){?>
					 <option value="<?php echo $jeu['id'] ?>" <?php if( $jeu['id'] == $joueur['fk_jeu']){echo "selected";}?>><?php echo htmlspecialchars($jeu['nom']); ?></option>
				<?php } ?>
					
				</select>
				<br><br>
				<input type="submit" value="Submit">
				<a href="admin.php">Cancel</a>
			</form>
		</div>
	</div>
</body>
</html>