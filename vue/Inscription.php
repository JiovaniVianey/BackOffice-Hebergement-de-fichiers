<?php
include "../head.php";
include "../navbar.php";
?>

<link rel="stylesheet" href="../style/styleInscription.css">
<br><br>

<div class="container-sm">
  <form action="index.php?action=seConnecter&option=seConnecter" method="POST">

  <div class="container">
  
    <h3> <b>Inscription</b> <h3>
    <hr>
    <label for="identifiant"> <h4> <b>Identifiant</b> </h4> </label>
    <input type="text" class="form-control" placeholder="Entrez votre identifiant" name="login" id="login" required >
  

    <label for="mdp"><h4><b>Mot de passe</b></h4></label>
    <input type="password" class="form-control" placeholder="Entrez votre mot de passe" name="mdp" id="mdp">
    <label for="mdp"><h4><b>Confirmez votre Mot de passe</b></h4></label>
    <input type="password" class="form-control" placeholder="Entrez votre mot de passe" name="checkmdp" id="checkmdp">
        
    <button type="submit" name="valider" >S'inscrire</button>
  </div>
</form>
</div>

<br><br><br><br>