<?php
class Utilisateur
{
  private $id;
  private $nom;
  private $prenom;
  private $mail;
  private $mdp;
  private $admin;
  private $autoriser  ;
  private $droit_ajouter;
  private $droit_supprimer;


  public function _construct($id,$prenom,$nom,$mail,$mdp,$admin,$autoriser,$droit_ajouter,$droit_supprimer){
    $this->id=$id;
    $this->prenom=$prenom;
    $this->nom=$nom;
    $this->mail=$mail;
    $this->mdp=$mdp;
    $this->admin = false;
    $this->autoriser = false;
    $this->droit_ajouter = false;
    $this->droit_supprimer = false;
  }


  // ID
  public function getId(){
    return $this->id;
  }

  // PRENOM
  public function getPrenom(){
    return $this->prenom;
  }
  public function setPrenom($prenom){
    $this->prenom = $prenom;
  }

  // NOM
  public function getNom(){
    return $this->nomUser;
  }
  public function setLogin($nom){
    $this->nom = $nom;
  }

  // MAIL
  public function getMail(){
    return $this->mail;
  }

  //MOT DE PASSE
  public function getMdp(){
    return $this->mdp;
  }
  public function setMdp($nvMdp){
    $this->mdp = $nvMdp;
  }

  // ADMIN
  public function getAdmin(){
    return $this->admin;
  }
  public function setAdmin($nvAdmin){
    $this->admin =$nvAdmin;
  }

  // AUTORISATION
  public function getAutoriser(){
    return $this->autoriser;
  }
  public function setAutoriser($autoriser){
    return $this->autoriser = $autoriser;
  }

  // DROIT_AJOUTER
  public function getDroit_ajouter(){
    return $this->droit_modif;
  }

  // DROIT_SUPPRIMER
  public function getDroit_supprimer(){
    return $this->droit_modif;
  }


  public static function ajouterUtilisateur(Utilisateur $utilisateur){
    $req=MonPdo::getInstance()->prepare("insert into utilisateur(prenom,nom,mail) values(:prenom,:nom,:mail) ");
    $prenom=$utilisateur->getPrenom();
    $req->bindParam(':prenom',$prenom);
    $nom=$utilisateur->getNom();
    $req->bindParam(':nom',$nom);
    $mail=$utilisateur->getMail();
    $req->bindParam(':mail',$mail);
    $req->execute();
  }


  public static function supprimerUtilisateur(Utilisateur $utilisateur){
    $req=MonPdo::getInstance()->prepare("delete from utilisateur where id=:id ");
    $id=$utilisateur->getId();
    $req->bindParam(':id', $id);
    $req->execute();
  }

  public static function changerMdp(Utilisateur $utilisateur){
    $req=MonPdo::getInstance()->prepare("update utilisateur set mdp = :mdp where id=:id");
    $mdp=$utilisateur->getMdp();
    $req->bindParam(':mdp',$mdp);
    $id=$utilisateur->getId();
    $req->bindParam(':id',$id);
    $req->execute();
  }

  public static function changeAutorisation(Utilisateur $utilisateur){
    $req=MonPdo::getInstance()->prepare("update utilisateur set autoriser= :autoriser where id=:id"); //il faudra voir bdd
    $autoriser=$utilisateur->getAutoriser();
    $req->bindParam(':autoriser',$autoriser);
    $id=$utilisateur->getId();
    $req->bindParam(':id', $id);
    $req->execute();
  }

  public static function changeAdmin(Utilisateur $utilisateur){
    $req=MonPdo::getInstance()->prepare("update utilisateur set admin = :admin where id=:id");     // il faudra voir avec la base de données
    $admin=$utilisateur->getAdmin();
    $req->bindParam(':admin',$admin);
    $id=$utilisateur->getId();
    $req->bindParam(':id',$id);
    $req->execute();
  }

  public static function changeDroit_ajouter(Utilisateur $utilisateur){
    $req=MonPdo::getInstance()->prepare("update utilisateur set droit_ajouter= :droit_ajouter where id=:id");   // il faudra voir avec la base de données
    $droit_ajouter=$utilisateur->getDroit_ajouter();
    $req->bindParam(':droit_ajouter',$droit_ajouter);
    $id=$utilisateur->getId();
    $req->bindParam(':id',$id);
    $req->execute();
  }

  public static function changeDroit_supprimer(Utilisateur $utilisateur){
    $req=MonPdo::getInstance()->prepare("update utilisateur set droit_supprimer= :droit_supprimer where id=:id");   // il faudra voir avec la base de données
    $droit_supprimer=$utilisateur->getDroit_supprimer();
    $req->bindParam(':droit_supprimer',$droit_supprimer);
    $id=$utilisateur->getId();
    $req->bindParam(':id',$id);
    $req->execute();
  }

  public static function afficherTous(){
    $req=MonPdo::getInstance()->prepare("select*from utilisateur");
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'utilisateur');
    $req->execute();
    $lesResultats=$req->fetchAll();
    return $lesResultats;
  }

  public static function afficherRechercheUtilisateur(){
    $recherche=$_POST["recherche"] ;
    $recherche=strtolower($recherche) ;
    $req=MonPdo::getInstance()->prepare("select*from utilisateur where lower(prenom) like'%$recherche%' OR lower(nom) like '%$recherche%'");
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'utilisateur');
    $req->execute();
    $lesResultats=$req->fetchAll();
    return $lesResultats;
  }

  public static function trouverUtilisateur($id){
    $req=MonPdo::getInstance()->prepare("select * from utilisateur where id=:id");
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'utilisateur');
    $req->bindParam(':id',$id);
    $req->execute();
    $leResultat=$req->fetch();
    return $leResultat;
  }

  public static function trouverUtilisateurparMail($mail){
    $req=MonPdo::getInstance()->prepare("select * from utilisateur where mail=:mail");
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'utilisateur');
    $req->bindParam(':mail',$mail);
    $req->execute();
    $leResultat=$req->fetch();
    return $leResultat;
  }

  function getDossiers()
  {
    //la requète récupe les info de chaque user pr les lignes
    $sql =  'SELECT utilisateur.id , utilisateur.prenom, utilisateur.nom, utilisateur.mail, utilisateur.ip, utilisateur.droit_ajout, utilsateur.droit_suppression
    FROM fichier JOIN utilisateur on utilisateur.id=fichier.idUtilisateur
    GROUP BY idUser';

    $result = MonPdo::getInstance()->query($sql);
    $lesDossiers = $result->fetchAll();
    return $lesDossiers;
  }

  // Token Aléatoire

	function genererToken(
		int $length = 64,
		string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
	): string {
		if ($length < 1) {
			throw new \RangeException("Length must be a positive integer");
		}
		$pieces = [];
		$max = mb_strlen($keyspace, '8bit') - 1;
		for ($i = 0; $i < $length; ++$i) {
			$pieces []= $keyspace[random_int(0, $max)];
		}
		return implode('', $pieces);
	}

  // Maj Token

  public static function changerToken($token,$mail){
    $req=MonPdo::getInstance()->prepare("update utilisateur set token = MD5(:token) where mail=:mail");
    $req->bindParam(':token',$token);
    $req->bindParam(':mail',$mail);
    $req->execute();
  }

}
 ?>
