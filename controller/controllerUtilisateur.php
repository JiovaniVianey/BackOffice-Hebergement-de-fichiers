<?php
$action = $_GET["action"] ;

    switch($action){
        case "Connexion":
            include("vue/ConnexionUtil.php");
            break;
        case "Inscription":
            include("vue/inscription.php");
            break;
        case "MdpOublie":
            include("vue/FormMdpOublie.php");
            break;
        case "changementMdp":
            include("vue/FormChangementMdp.php");
            break;
        case "MailEnvoiMDP":

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
                if (Utilisateur::verifier($_POST["mail"],$_POST["mdp1"])){
                    $_SESSION['messageerror'] = "Compte Dejà Existant";
                    include("vue/Inscription.php");
                    exit;
                }
                $Utilisateur = new Utilisateur();
                $Utilisateur->setPrenom($_POST["prenom"]);
                $Utilisateur->setNom($_POST["nom"]);
                $Utilisateur->setMdp($_POST["mdp1"]);
                $Utilisateur->setMail($_POST["mail"]);
                $Utilisateur->setAdmin(0);
                $Utilisateur->setAutoriser(0);
                $Utilisateur->setDroit_ajouter(0);
                $Utilisateur->setDroit_supprimer(0);
                Utilisateur::ajouterUtilisateur($Utilisateur);
                $ip = Utilisateur::addresseIP();
                Utilisateur::changeraddresseIPInscrit($ip,$_POST["mail"],MD5($_POST["mdp1"]));
                include("controller/controllerMail");
                include("vue/Attente.php");
            }
            else{
                $_SESSION['messageerror'] = "Mot de Passe Non Identique";
                include("vue/Inscription.php");
            }
            break;
        case "changeradmin" :
            $Utilisateur=Utilisateur::trouverUtilisateur($_GET["id"]);
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
            include("vue/liste_utilisateurs_vue.php") ;
            break;
        case "seConnecter" :
            $rep=Utilisateur::verifier($_POST["login"], MD5($_POST["pass"]));
            if($rep==true){
                $valider = Utilisateur::valider($_POST["login"], MD5($_POST["pass"]));
                $idConnecte = $valider[0]->getId();
                $_SESSION["connecte"] = $idConnecte;
                $id = $valider[0]->getId();
                $ip = Utilisateur::addresseIP();
                Utilisateur::changeraddresseIP($ip,$id);
                $lesDossiers = Utilisateur::getDossiers();
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
        case"afficheun":
            Utilisateur::trouverUtilisateur($_GET["??"]);
            include("??");
        break;
        case"affichnonauto":
            Utilisateur::afficherNonautorise();
            include("??");
        break;
    }
?>