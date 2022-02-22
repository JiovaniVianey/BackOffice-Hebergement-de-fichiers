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

            $res = Utilisateur::trouverUtilisateurparMail($_POST["mail"]);
            if ($res->num_rows == 0) {
                $_SESSION['messageerror'] = "Email Non Enregistré";
                include("vue/FormMdpOublie.php");
            }
            else
            {
                $token = Utilisateur::genererToken();
                Utilisateur::changerToken($_POST["mail"],$token);
                include("controllerMail.php?action=MdpOublie");
                include("vue/FormMdpOublie.php");
            }
            break;
    }
?>