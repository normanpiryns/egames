<?php
include('../Model/read.php');
$jeux = RecupJeux();
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  	<link rel="stylesheet" type="text/css" href="Ressources/CSS/reset.css">
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../Ressources/CSS/styles.css">
	<title>E-games</title>
</head>
<body>
	<div class="container">
		<?php include('Include/nav.php'); ?>
		<p id="error">
			<!-- Error handling-->
			<?php 
					if(isset($_GET['error'])){
						switch($_GET['error']){
							case 'error-1':
								echo "Veuillez remplir le nom.";
								break;
							case 'error-2':
								echo "Nom d'equipe déjà existant.";
								break;
							case 'error-3':
								echo "Les symboles ne sont pas authorisés.";
								break;

							};
					}
			?>

		</p>
		<form action="../Controller/ajoutEquipe-controller.php" method="post">
			<label for="team">Équipe:</label>
				<br>
				<input type="text" name="team">
				<br>
				<label for="jeu">Jeu:</label>
				<br>
				<select name="fk_jeu">
					<?php foreach($jeux as $jeu){?>
					 <option value="<?php echo $jeu['id'] ?>"><?php echo htmlspecialchars($jeu['nom']); ?></option>
				<?php } ?>
				</select>
				<br><br>
			<input type="submit" name="Submit">
			<a href="admin.php">Back</a>
		</form>
		
	</div>
</body>
</html>