<!doctype html>

<?php
    include("../head.php");
?>

<html>
	<head>
		<title>Inscription</title>
		<meta charset='utf-8'>
		<link rel='stylesheet' href='../style/styleInscription.css'>
	</head>

	<header>
        <h1>MyFile.com</h1>
      </header>

      <br>
      <br>

	<body>
      <form class="box" method="POST" action="inscription.php">
      <h2>Inscription</h2>
      
      <hr>

      <label for="identifiant"> <h6> <b>Nom</b> </h6> </label>
      <input type='text' name='nom' placeholder="Identifiant" required="">

      <label for="identifiant"> <h6> <b>Prénom</b> </h6> </label>
      <input type='text' name='prénom' placeholder="Identifiant" required="">
      
      <label for="mail"> <h6> <b>E-mail</b> </h6> </label>
      <input type='email' name='mail' placeholder="E-mail" required="">
      
      <label for="mdp"> <h6> <b>Mot de Passe</b> </h6> </label>
      <input type='password' name='mdp' placeholder="Mot de Passe" required="">

      <label for="mdp"> <h6> <b>Confirmez votre Mot de Passe</b> </h6> </label>
      <input type='password' name='mdp2' placeholder="Mot de Passe" required="">

      <input type="submit" value="S'inscrire"/>

      </form>
	</body>

</html>