<?php
include("modele/Admin.class.php");
include("modele/monPdo.php");
include("modele/Fichier.class.php");


if(empty($_GET["uc"]))
{
    $uc="accueil";
}
else {
    $uc=$_GET["uc"];
}



switch($uc)
{
    case "accueil" :
        include("vues/accueil.php") ;
    break;

    case "admin" :
        include("controleurs/controlleurAdmin.php");
    break;
    case "fichier" :
        include("controleurs/controlleurFichier.php");
    break;
    case "utilisateur" :
        include("controleurs/controlleurUtilisateur.php");
    break;
   
        
}





?>