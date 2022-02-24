<!doctype html>

<?php
    include("head.php");
?>

<html>
	<head>
		<title>Connexion</title>
		<meta charset='utf-8'>
		<link rel='stylesheet' href='style/styleConnexion.css'>
	</head>

	<header>
        <h1>MyFile.com</h1>
    </header>

<?php
	if (session_status() === PHP_SESSION_NONE) {
		session_start();
	}
	if (!empty($_SESSION['messageclear']))
    {
        ?>
        <div class="alert alert-success" role="alert" id="alert" >
           <?php echo $_SESSION['messageclear'] ." <i class='far fa-check-circle'></i>" ; $_SESSION['messageclear'] = null; ?>
        </div>
   <?php
    }

    if (!empty($_SESSION['messageerror']))
    {
        ?>
        <div class="alert alert-danger" role="alert" id="alert" >
            <?php echo $_SESSION['messageerror'] ." <i class='fas fa-times'></i>"; $_SESSION['messageerror'] = null; ?>
        </div>
    <?php
    }
?>

	<body>
		
		<form class="box" method="POST" action="index.php?uc=utilisateur&action=seConnecter">
		<h2>Connexion</h2>
		<hr>
		<input type='text' name='pseudo' placeholder="Login" required="">
		<input type='password' name='pseudo' placeholder="Mot de Passe" required="">
		
		<input type="submit" value="Se Connecter"/>
		<hr>
		<label for="identifiant"> <p> Pas Encore Inscrit ? <a href="index.php?uc=utilisateur&action=Inscription">S'incrire</a> </p> </label>
		<br>
		<a href="index.php?uc=utilisateur&action=MdpOublie">Mot de passe oublié ? </a>

		</form>
	</body>
</html>	