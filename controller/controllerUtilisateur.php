<?php

$action = $_GET["util"] ;

    switch($action){
        case "MailEnvoiMDP":
            Utilisateur::trouverUtilisateurparMail($_POST["mail"]);
            
            break;
    }
?>