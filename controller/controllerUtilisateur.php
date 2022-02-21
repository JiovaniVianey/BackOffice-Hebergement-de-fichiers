<?php

$action = $_GET["util"] ;

    switch($action){
        case "MailEnvoiMDP":
            session_start();
            $res = Utilisateur::trouverUtilisateurparMail($_POST["mail"]);
            if ($res->num_rows == 0) {
                $_SESSION['messageerror'] = "Mail Non Enregistré";
                include("vue/FormMdpOublie.php");
            }
            else
            {
                include("controllerMail.php?action=MdpOublie");
                include("vue/FormMdpOublie.php");
            }
            break;
    }
?>