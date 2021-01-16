<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  	<link rel="stylesheet" type="text/css" href="Ressources/CSS/reset.css">
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="Ressources/CSS/styles.css">
	<title>E-games</title>
</head>
<body style="background-color: black">
	<div class="container">
		<?php include('View/Include/nav.php'); ?>
		<p id="success">
			<?php if(isset($_GET['success'])){ echo "Vous êtes bien inscrit(e) dans notre système.";}?>
		</p>
		<div id="section">
			<img src="/egames/images/lol-worlds2019.jfif">
			<div id="btn-wrap">
				<a href="View/inscriptionJoueur.php">Inscrire un joueur</a>
				<a href="View/inscriptionEquipe.php">Inscrire une equipe</a>
			</div>
			
		</div>
		<footer>
			<p> Norman Piryns - IFOSUP Wavre </p>
		</footer>
	</div>
</body>
</html>