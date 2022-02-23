<!doctype html>

<?php
    include("../head.php");
?>

<html>
	<head>
		<title>Connexion</title>
		<meta charset='utf-8'>
		<link rel='stylesheet' href='style/styleInscription.css'>
	</head>

	<header>
        <h1>MyFile.com</h1>
    </header>

	<br>
	<br>

	<body>
		
		<form class="box" method="POST" action="login.html">
		<h2>Connexion</h2>
		<hr>
		<input type='text' name='pseudo' placeholder="Login" required="">
		<input type='password' name='pseudo' placeholder="Mot de Passe" required="">
		
		<input type="submit" value="Se Connecter"/>
		<hr>
		<label for="identifiant"> <p> Pas Encore Inscrit ? <a href="Inscription.php">S'incrire</a> </p> </label>
		<br>
		<a href="FormMdpOublie.php">Mot de passe oublié ? </a>

		</form>
	</body>
</html>	