<?php

$action = $_GET["action"] ;

    switch($action){
        case "MailEnvoiMDP":
            session_start();

            if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL) || empty($_POST["mail"]))
            {
                $_SESSION['messageerror'] = "Email Invalide";
                include("vue/FormMdpOublie.php");
                exit;
            }

            $res = utilisateur::trouverUtilisateurparMail($_POST["mail"]);
            if ($res->num_rows == 0) {
                $_SESSION['messageerror'] = "Email Non Enregistré";
                include("vue/FormMdpOublie.php");
            }
            else
            {
                $token = utilisateur::genererToken();
                Utilisateur::changerToken($_POST["mail"],$token);
                include("controllerMail.php?action=MdpOublie");
                include("vue/FormMdpOublie.php");
            }
            break;
            case "Ajout" :
                $utilisateur = new Utilisateur();
                $utilisateur->setPrenom($_POST["?"]);
                $utilisateur->setNom($_POST["?"]);
                $utilisateur->setMdp($_POST["?"]);
                $utilisateur->setMail($_POST["?"]);
                $utilisateur->setAdmin(false);
                $utilisateur->setAutoriser(false);
                $utilisateur->setDroit_ajouter(false);
                $utilisateur->setDroit_supprimer(false);
                Utilisateur::ajouter($produit);
                //afficher la liste
                include("?") ;
            break;
            case "changeradmin" :
                $utilisateur=Utilisateur::trouverUtilisateur($_GET["??"]);
                Utilisateur::changeAdmin($utilisateur);
                $lesUtilisateur=Utilisateur::afficherTous();
                include("??") ;
            break;
            case "changerautoriser" :
                $utilisateur=Utilisateur::trouverUtilisateur($_GET["??"]);
                Utilisateur::changeAutoriser($utilisateur);
                $lesUtilisateur=Utilisateur::afficherTous();
                include("??") ;
            break;
            case "changerdroit_ajout" :
                $utilisateur=Utilisateur::trouverUtilisateur($_GET["??"]);
                Utilisateur::changeDroit_ajouter($utilisateur);
                $lesUtilisateur=Utilisateur::afficherTous();
                include("??") ;
            break;
            case "changerdroit_supprimer" :
                $utilisateur=Utilisateur::trouverUtilisateur($_GET["??"]);
                Utilisateur::changeDroit_supprimer($utilisateur);
                $lesUtilisateur=Utilisateur::afficherTous();
                include("??") ;
            break;
            case "supprimer" :
                $utilisateur=Utilisateur::trouverUtilisateur($_GET["??"]);
                Utilisateur::supprimerUtilisateur($utilisateur);
                $lesUtilisateur=Utilisateur::afficherTous();
                include("??") ;
            break;
            case "affich" :

                $lesUtilisateur=Utilisateur::afficherTous();
                include("??") ;
            break;
    }
?>