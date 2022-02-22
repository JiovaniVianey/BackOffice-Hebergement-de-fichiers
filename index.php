<?php
include("modele/Admin.class.php");
include("modele/monPdo.php");
include("modele/Fichier.class.php");
include("modele/Utilisateur.class.php");
include("head.php");


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
        include("vue/accueil.php") ;
    break;

    case "admin" :
        include("controller/controllerAdmin.php");
    break;
    case "fichier" :
        include("controller/controllerFichier.php");
    break;
    case "utilisateur" :
        include("controller/controllerUtilisateur.php");
    break;
}





?>