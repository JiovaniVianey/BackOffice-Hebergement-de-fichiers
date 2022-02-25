<?php
include_once('head.php');
include_once("modele/Admin.class.php");
include_once("modele/monPdo.php");
include_once("modele/Fichier.class.php");
include_once("modele/Utilisateur.class.php");
$rep=Utilisateur::verifier($_POST["login"], MD5($_POST["pass"]));
            if($rep==true){
                $valider = Utilisateur::valider($_POST["login"], MD5($_POST["pass"]));
                $idConnecte = $valider[0]->getId();
                $_SESSION["connecte"] = $idConnecte;
                $id = $valider[0]->getId();
                $ip = Utilisateur::addresseIP();
                Utilisateur::changeraddresseIP($ip,$id);
                $lesDossiers = Utilisateur::getDossiers();
                include_once('index.php');
            }
            else{
                $_SESSION['messageerror'] = "Login ou Mot de Passe Incorrect";
                include("vue/ConnexionUtil.php");
            }
?>