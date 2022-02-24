<!doctype html>
<html>
	<head>
		<title>Attente...</title>
		<meta charset='utf-8'>
	</head>
    <body>
        <center>
        <img class="imgsad" src="images/sad3v2.gif" alt="...">
        <h3>L'administrateur vous donnera l'accès très prochainement.</h3>
        </center>
    </body>
</html>

<?php
    if ($Utilisateur->getAutoriser() == true){
        header('index.php');
    }
?>