<?php
class Fichier{
    private $id;
    private $nom;
    private $idutil;
    private $chemin;
    private $taille;
    private $type;


//GETTER
function getId() {
    return $this->id;
}


function getNom(){
    return $this->nom;
}


function getIdutil() {
    return $this->idutil;
}


function getChemin(){
    return $this->chemin;
}


function getTaille(){
    return $this->taille;
}


function getType(){
    return $this->type;
}



//SETTER
function setId($id){
    $this->id = $id; 
}
function setNom($nom){
    $this->nom = $nom;
}
function setIdutil($idutil){
    $this->idutil =$idutil;
}
function setChemin($chemin){
    $this->chemin = $chemin;
}
function setTaille($taille){
    $this->taille = $taille;
}
function setChemin($type){
    $this->type = $type;
}
public static function afficherTous(){
    $req=MonPdo::getInstance()->prepare("select*from fichier");
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'fichier');
    $req->execute();
    $lesResultats=$req->fetchAll();
    return $lesResultats;
}
public static function afficherRecherche(){
    $recherche=$_POST["recherche"] ;
	$recherche=strtolower($recherche) ;
    $req=MonPdo::getInstance()->prepare("select*from fichier where lower(nom) like'%$recherche%'");
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'fichier');
    $req->execute();
    $lesResultats=$req->fetchAll();
    return $lesResultats;
}
public static function ajouter(Fichier $fichier){
    $req=MonPdo::getInstance()->prepare("insert into fichier (nom, chemin, type, taille, idutil) values(:nom, :chemin, :type, :taille, :idutil)");
    $nom=$fichier->getNom();
    $req->bindParam('nom',$nom);
    $chemin=$fichier->getChemin();
    $req->bindParam('chemin',$chemin);
    $type=$fichier->getType();
    $req->bindParam('type',$type);
    $taille=$fichier->getTaille();
    $req->bindParam('taille',$taille);
    $idutil = $fichier->getIdutil();
    $req->bindParam('idutil',$idutil);
    $nb=$req->execute();
    
}
public static function trouverUnFichier($id){
    $req=MonPdo::getInstance()->prepare("select * from fichier where id=:id");
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'fichier');
    $req->bindParam('id',$id);
    $req->execute();
    $leResultat=$req->fetch();
    return $leResultat;
}
// public static function modifier(Produit $produit){
//     $req=MonPdo::getInstance()->prepare("update produit set nom=:nom, prix=:prix, photo=:photo where id=:id ");
//     $id=$produit->getId();
//     $req->bindParam('id',$id);
//     $nom=$produit->getNom();
//     $req->bindParam('nom',$nom);
//     $prix=$produit->getPrix();
//     $req->bindParam('prix',$prix);
//     $photo=$produit->getPhoto();
//     $req->bindParam('photo',$photo);
//     $nb=$req->execute();
//     $_SESSION['alert']="le produit a été ajouté !";
//     return $SESSION['alert'];
// }
public static function supprimer(Fichier $fichier){
    $req=MonPdo::getInstance()->prepare("delete from fichier where id=:id ");
    $id=$fichier->getId();
    $req->bindParam('id',$id);
    $nb=$req->execute();
}
public static function afficherParIdutil($p){
    $util=$p ;
	
    $req=MonPdo::getInstance()->prepare("select*from fichier where idutil='%$util%'");
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'fichier');
    $req->execute();
    $lesResultats=$req->fetchAll();
    return $lesResultats;
}
?>