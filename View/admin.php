<?php
include('../Model/read.php');
$infos=getAllData();
$games=RecupJeux();
$teams=RecupEquipes();
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
		<p id="success"><?php if(isset($_GET['success'])){
									switch ($_GET['success']) {
										case 1:
											echo "Nouveau administrateur ajouté";
											break;
										case 2:
											echo "Participant modifié.";
											break;
										case 3:
											echo "Équipe modifié.";
											break;
										case 4:
											echo "Joueur effacé.";
											break;
										case 5:
											echo "Équipe effacé.";
											break;
										}

		}?></p>
		<!--<a href="ajoutEquipe.php">Ajout d'une équipe</a>
		<br><br>-->
		<a href="addAdmin.php">Ajouter un administrateur</a>
		<br><br>
		<div>
			<?php foreach ($games as $game) { ?>
				<div class="liste">
					<table class="table">
						<thead>

							<h3>Liste de participants 'seuls' de <?php echo $game['nom']?>:</h3>
							<hr><br>
							<tr>
								<th>Nom</th>
								<th>Prénom</th>
								<th>Âge</th>
								<th>E-mail</th>
								<th>Pseudo</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($infos as $info){ 
								if ($info['eqnom'] === NULL and $info['fk_jeu'] == $game['id']) {?>
								<tr>
									<td><?php echo $info['nom']?></td>
									<td><?php echo $info['prenom']?></td>
									<td><?php echo $info['age']?></td>
									<td><?php echo $info['email']?></td>
									<td><?php echo $info['pseudo']?></td>
									<td><a href="/egames/View/modifyJoueur.php?id=<?php echo $info['id']?>">EDIT</a></td>
									<td><a href="/egames/Controller/deletejoueur.php?id=<?php echo $info['id']?>">DEL</a></td>
								</tr>
							<?php 
								} 
							}	
						?>
						</tbody>
					</table>
				</div>
			<?php }?> 	
		</div>
		<div>
			<?php foreach ($games as $game) { 
					foreach($teams as $team) { 
			  			if ($team['fk_jeu'] == $game['id']) { ?>
			  				<h3><?php echo $team['nom']." (".$game['nom'].")"?></h3>
			  				<div class="btn-pair">
			  				<a href="/egames/View/modifyEquipe.php?id=<?php echo $team['id'] ?>">EDIT</a>
			  				<a href="/egames/Controller/deleteEquipe.php?id=<?php echo $team['id']?>">DEL</a>
			  				</div>
			  				<hr>
			  				<table class="table">
								<thead>
									<tr>
										<th>Nom</th>
										<th>Prénom</th>
										<th>Âge</th>
										<th>E-mail</th>
										<th>Pseudo</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($infos as $info){ 
										if ($info['fk_equipe'] == $team['id']) {?>
										<tr>
											<td><?php echo $info['nom']?></td>
											<td><?php echo $info['prenom']?></td>
											<td><?php echo $info['age']?></td>
											<td><?php echo $info['email']?></td>
											<td><?php echo $info['pseudo']?></td>
										</tr>
									<?php 
										} 
									}	
								?>
								</tbody>
							</table>
			  			<?php } ?>
			  <?php }
				  } ?>
		</div>

	</div>
</body>
</html>