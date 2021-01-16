<?php


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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/main.js"></script>
	<link rel="stylesheet" type="text/css" href="../Ressources/CSS/styles.css">
	<title>E-games</title>
</head>
<body>
	<div class="container">
		<?php include('Include/nav.php'); ?>
		<p style="color: lightgray;font-style: italic;">Le mot de passe doit contenir un nombre et une majuscule.</p>
		<p class="e error-1">Veuillez remplir tous les champs.</p>
		<p class="e error-2">Le login n'est pas libre.</p>
		<p class="e error-3">Le login ne peut pas contenir des symboles.</p>
		<p class="e error-4">Le mot de passe doit contenir une majuscule.</p>
		<p class="e error-5">Le mot de passe doit contenir une chiffre.</p>

       
	<form action="/egames/Controller/addAdmin-controller.php" method="post" id="form-add"> 	
    <label>Login : </label>
    <br>
    <input id="login-field" type="text" name="login"/>
    <br>
    <label>Password : </label>
    <br>
    <input id= "password-field" type="password" name="mdp"/>
    <br><br>
    <!--<input type="submit" value="Register" />-->
    <a href="#" id="submit-button">Submit</a>
    <a href="/egames/View/admin.php">Back</a>

		</form>
	</div>
</body>
</html>