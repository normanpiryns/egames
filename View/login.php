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
  <form action="..\Controller\login-controller.php" method="post" >
  	<p id="error">
        <?php if(isset($_GET['error'])){
									switch($_GET['error']){
										case 'error-1':
											echo "Veuillez remplir tous les champs.";
											break;
										case 'error-2':
											echo "Login invalide.";
											break;
										case 'error-3':
											echo "Mot de passe incorrecte.";
											break;
										case 'error-4':
											echo "Une erreure s'est produit.";
											break;
										};
								}
							?>
    </p>
    <label>Login : </label>
    <br>
    <input type="text" name="login"/>
    <br>
    <label>Password : </label>
    <br>
    <input type="password" name="mdp"/>
    <br><br>
    <input type="submit" value="Login" />
    <a href="../index.php">Back</a>
</form>

</div>

</body>
</html>