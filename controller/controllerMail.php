<?php

$mailaction = $_GET["mailaction"];
$email = "service.myfile@gmail.com";
$mdpmail = "eh-8dXC2_bh!(jPK";

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create de l'instance PHPMailer
$envoi_mail = new PHPMailer;

$envoi_mail->Host = 'smtp.gmail.com';
$envoi_mail->Port = 587; // 465;
$envoi_mail->SMTPSecure = 'tls'; //PHPMailer::ENCRYPTION_SMTPS;//

$envoi_mail->isSMTP();
$envoi_mail->SMTPAuth = true;

//Mot de Passe et adresse e-mail (Gmail) 
$envoi_mail->Username = $email;
$envoi_mail->Password = $mdpmail;

$envoi_mail->SMTPDebug = 0;
//$envoi_mail->debugoutput = 'html';

$mailExpediteur = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
$objet = trim(filter_input(INPUT_POST, "objet", FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED));
$message = trim(filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED));

// Expéditeur
$mailContact = $email;
$nomContact = "MyFile.com";
$envoi_mail->setFrom($mailContact, $nomContact);

switch($mailaction){
    case "MdpOublie":
        // Destinataire
        $mailDestinataire = $_POST["mail"];
        $envoi_mail->addAddress($mailDestinataire);

        // Objet du Mail
        $envoi_mail->Subject = 'MyFile.com - Réinitialisation de Mot De Passe';

        // Corps du Mail (HTML)
        $envoi_mail->isHTML(true);

        // Info de l'utilisateur
        $res = Utilisateur::trouverUtilisateurparMail($_POST["mail"]);

        // Sauvegarde Token
        $token = Utilisateur::genererToken();
        Utilisateur::changerToken($token,$_POST["mail"]);

        $body = "<b> <font size=\"3\"> Bonjour, ".$res->getNom()." ".$res->getPrenom()." </font> </b>";
        $body .= "<p> <font size=\"2\"> Afin de réinitiailiser votre Mot de passe: </font> </p>";
        $body .= "<hr> <a href='http://127.0.0.1/projet-fichier-administration/index.php?uc=utilisateur&action=changementMdp&token=".$token."'> Cliquez ici </a>";

        // Corps du Mail (Non HTML)
        $text_body  = "Bonjour, ".$res->getNom()." ".$res->getPrenom()." \n\n";
        $text_body .= "Cliquez ici afin de réinitiailiser votre Mot de passe: \n\n";
        $text_body .= "http://127.0.0.1/projet-fichier-administration/index.php?uc=utilisateur&action=changementMdp&token=".$token."";
        break;
    case "NotifInscrit":
        // Destinataires (Admin)
        $lesMail = Utilisateur::trouverAdmin();
        foreach($lesMail as $mailDestinataire){
            $envoi_mail->addAddress($mailDestinataire->mail);
            //echo $mailDestinataire->email;
            //echo "<br>";
        }

        // Informations de l'inscrit
        $util = Utilisateur::verifier($_POST["mail"], MD5($_POST["mdp1"]));

        // Objet du Mail
        $envoi_mail->Subject = 'MyFile.com - Nouvel Inscription';

        // Corps du Mail (HTML)
        $envoi_mail->isHTML(true);

        $body = "<b> <font size=\"3\"> Vous avez un nouvel utilisateur inscrit sur MyFile.com </font> </b>";
        $body .= "<p> <font size=\"2\"> Informations: <hr> Nom: ".$util->getNom()." <br> Prénom: ".$util->getPrenom()." <br> Adresse Mail: ".$util->getMail()." <br> Adresse IP: ".$util->getAddresseIP()."  </font> </p>";
        $body .= "<hr> Afin de gérer le nouveau venu: <br>";
        $body .= "<hr> <a href='http://127.0.0.1/projet-fichier-administration/index.php?uc=utilisateur&action='> Cliquez ici </a>";

        // Corps du Mail (Non HTML)
        $text_body  = "Vous avez un nouvel utilisateur inscrit sur MyFile.com \n\n";
        $text_body .= "Informations: \n\n";
        $text_body .= "Nom: ".$util->getNom()." \n";
        $text_body .= "Prénom: ".$util->getPrenom()." \n";
        $text_body .= "Adresse Mail: ".$util->getMail()." \n";
        $text_body .= "Adresse IP: ".$util->getAddresseIP()." \n\n";
        $text_body .= "Afin de gérer le nouveau venu: \n";
        $text_body .= "http://127.0.0.1/projet-fichier-administration/index.php?uc=utilisateur&action=";
        break;
}

$envoi_mail->Body    = $body;
$envoi_mail->AltBody = $text_body;
$envoi_mail->CharSet = "UTF-8";

// Vérification et Envoi du Mail
if ($mailaction == "MdpOublie")
{
    if ($envoi_mail->send()) {
        $_SESSION['messageclear'] = "Message Envoyé";
    } else {    
        $_SESSION['messageerror'] = "Message Non Envoyé";
    }
}
?>