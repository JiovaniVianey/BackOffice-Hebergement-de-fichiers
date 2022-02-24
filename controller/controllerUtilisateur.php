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
			
			/*if (Utilisateur::MDPFort($_POST["pass1"]) == false)
            {
                $_SESSION['messageerror'] = "Le mot de passe doit comporter au moins 8 caractères et doit inclure au moins une lettre majuscule, un chiffre et un caractère spécial.";
                include("vue/FormChangementMdp.php");
                exit;
            }*/

			$token = $_GET["token"];
            $ancienres = Utilisateur::trouverUtilisateurparToken($token);

            if (MD5($_POST["pass1"]) == $ancienres->getMdp())
            {
                $_SESSION['messageerror'] = "Mot de Passe dejà utilisé. Veuillez en saisir un nouveau";
                include("vue/FormChangementMdp.php");
                exit;
            }

			$securetoken = MD5($token);
			Utilisateur::changerMdpOublie($securetoken,$_POST["pass1"]);
			$_SESSION['messageclear'] = "Mot de Passe Modifié ! Connectez vous";
			include("vue/connexionUtil.php");
			
            break;
        case "Ajout" :
            if($_POST["mdp1"] == $_POST["mdp2"]){
                $Utilisateur = new Utilisateur();
                $Utilisateur->setPrenom($_POST["prenom"]);
                $Utilisateur->setNom($_POST["nom"]);
                $Utilisateur->setMdp($_POST["mdp1"]);
                $Utilisateur->setMail($_POST["mail"]);
                $Utilisateur->setAdmin(false);
                $Utilisateur->setAutoriser(false);
                $Utilisateur->setDroit_ajouter(false);
                $Utilisateur->setDroit_supprimer(false);
                Utilisateur::ajouter($Utilisateur);
                include("vue/Attente.php");
            }
            else{
                $_SESSION['messageerror'] = "Mot de Passe Non Identique";
                include("vue/Inscription.php");
            }
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
        case "seConnecter" :
            $rep=Admin::verifier($_POST["login"], md5($_POST["pass"]));
            if($rep==true){
                $_SESSION["autorisation"] = valider($_POST["login"], md5($_POST["pass"]));
                $lesFichier=Fichier::afficherParId($_SESSION["autorisation"]->getId());
                include("vue/accueil.php");
            }
            else{
                $_SESSION['messageerror'] = "Login ou Mot de Passe Incorrect";
                include("vue/ConnexionUtil.php");
            }
            break;
        case "deconnexion":
            Admin::deconnexion();
            include("vue/ConnexionUtil.php");
            break;
    }
?>