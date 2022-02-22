<!doctype html>

<?php
    include("../head.php");
?>

<html>
	<head>
		<title>Nouveau Mot de Passe</title>
		<meta charset='utf-8'>
		<link rel='stylesheet' href='../style/styleInscription.css'>
	</head>

	<header>
        <h1>MyFile.com</h1>
    </header>

	<br>
	<br>

<?php
	session_start();
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
		
		<form class="box" method="POST" action="../index.php?uc=utilisateur&action=changementMdp">
		<h2>Nouveau Mot de Passe</h2>
		<hr>
		<label for="identifiant"> <h6> <b>Veuillez saisir votre nouveau mot de passe :</b> </h6> </label>
		<input type='password' name='pass1' required="">
		<label for="identifiant"> <h6> <b>Confirmez votre nouveau mot de passe :</b> </h6> </label>
		<input type='password' name='pass2' required="">
		<input type="submit" value="Envoyer"/>
		</form>
	</body>
</html>	