<?php

$action = $_GET["action"] ;

    switch($action){
        case "Connexion":
            include("vue/ConnexionUtil.php");
            break;
        case "Inscription":
            include("vue/Inscription.php");
            break;
        case "MdpOublie":
            include("vue/FormMdpOublie.php");
            break;
        case "changementMdp":
            include("vue/FormChangementMdp.php");
            break;
        case "MailEnvoiMDP":
            session_start();

            if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL) || empty($_POST["mail"]))
            {
                $_SESSION['messageerror'] = "Email Invalide";
                include("vue/FormMdpOublie.php");
                exit;
            }

            $res = Utilisateur::trouverUtilisateurparMail($_POST["mail"]);
            if ($res == '') {
                $_SESSION['messageerror'] = "Email Inconnu sur notre site";
                include("vue/FormMdpOublie.php");
            }
            else
            {
                include("controller/controllerMail.php");
                include("vue/FormMdpOublie.php");
            }
            break;
        case "MdpChangé":
            session_start();

            if (($_POST["pass1"] != $_POST["pass2"]) || (empty($_POST["pass1"]) || empty($_POST["pass2"])))
            {
                $_SESSION['messageerror'] = "Mot de Passe Non Identique";
                include("vue/FormChangementMdp.php");
                exit;
            }
			
			if (strlen($_POST["pass1"] < 8))
            {
                $_SESSION['messageerror'] = "Mot de Passe Invalide, Veuillez Saisir un mot de passe plus longs (8 Caractères Minimum)";
                include("vue/FormChangementMdp.php");
                exit;
            }
			$token = $_GET["token"];
			$securetoken = MD5($token);
			Utilisateur::changerMdpOublie($securetoken,$_POST["pass1"]);
			$_SESSION['messageclear'] = "Mot de Passe Modifié ! Connectez vous";
			include("vue/connexionUtil.php");
			
            break;
        case "Ajout" :
            $Utilisateur = new Utilisateur();
            $Utilisateur->setPrenom($_POST["?"]);
            $Utilisateur->setNom($_POST["?"]);
            $Utilisateur->setMdp($_POST["?"]);
            $Utilisateur->setMail($_POST["?"]);
            $Utilisateur->setAdmin(false);
            $Utilisateur->setAutoriser(false);
            $Utilisateur->setDroit_ajouter(false);
            $Utilisateur->setDroit_supprimer(false);
            Utilisateur::ajouter($produit);
            //afficher la liste
            include("?") ;
            break;
        case "changeradmin" :
            $Utilisateur=Utilisateur::trouverUtilisateur($_GET["??"]);
            Utilisateur::changeAdmin($Utilisateur);
            $lesUtilisateur=Utilisateur::afficherTous();
            include("??") ;
            break;
        case "changerautoriser" :
            $Utilisateur=Utilisateur::trouverUtilisateur($_GET["??"]);
            Utilisateur::changeAutoriser($Utilisateur);
            $lesUtilisateur=Utilisateur::afficherTous();
            include("??") ;
            break;
        case "changerdroit_ajout" :
            $Utilisateur=Utilisateur::trouverUtilisateur($_GET["??"]);
            Utilisateur::changeDroit_ajouter($Utilisateur);
            $lesUtilisateur=Utilisateur::afficherTous();
            include("??") ;
            break;
        case "changerdroit_supprimer" :
            $Utilisateur=Utilisateur::trouverUtilisateur($_GET["??"]);
            Utilisateur::changeDroit_supprimer($Utilisateur);
            $lesUtilisateur=Utilisateur::afficherTous();
            include("??") ;
            break;
        case "supprimer" :
            $Utilisateur=Utilisateur::trouverUtilisateur($_GET["??"]);
            Utilisateur::supprimerUtilisateur($Utilisateur);
            $lesUtilisateur=Utilisateur::afficherTous();
            include("??") ;
            break;
        case "affich" :

            $lesUtilisateur=Utilisateur::afficherTous();
            include("??") ;
            break;
    }
?>