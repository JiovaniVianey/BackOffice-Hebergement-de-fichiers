<!doctype html>

<?php
    include("../head.php");
?>

<html>
	<head>
		<title>Mot de Passe Oublié ?</title>
		<meta charset='utf-8'>
		<link rel='stylesheet' href='../style/styleInscription.css'>
	</head>

	<header>
        <h1>MyFile.com</h1>
      </header>

	<br>
	<br>

	<body>
		
		<form class="box" method="POST" action="login.html">
		<h2>Mot de Passe Oublié ?</h2>
		<hr>
		<label for="identifiant"> <h6> <b>Veuillez saisir votre adresse e-mail afin de réinitialiser votre mot de passe :</b> </h6> </label>
		<input type='email' name='mail' required="">
		<input type="submit" value="Envoyer"/>
		</form>
	</body>
</html>	