<?php
    //test du submit
    if (isset($_POST['submit']))
    {
        //taille max (en octets)
        $maxSize = 5000000;

        //test récupération du fichier
        if($_FILES['uploaded_file']['error'] > 0)
        {
            echo "erreur du transfert";
            die;
        }
        //taille du fichier
        $fileSize = $_FILES['uploaded_file']['size'];
        //test taille max
        if ($fileSize > $maxSize)
        {
            echo "trop grand";
            die;
        }
        //type du fichier
        $fileExt = $_FILES['uploaded_file']['type'];

        $tmpName = $_FILES['uploaded_file']['tmp_name'];
        //remplacement des espaces
        $fileName = strreplace(' ', '', $_FILES['uploaded_file']['name']);
        //vérification de l'existance du dossier
        $nomDossier = '../fichier/'.$connecteduser->getNom().''.$connecteduser->getPrenom().''.$connecteduser->getId(); 
        if ( !is_dir( "../fichiers/$nomDossier" ) ) {
            mkdir("../fichiers/$nomDossier");
        }

        $filePath = "../fichiers/$nomDossier/".$fileName;
        move_uploaded_file($tmpName, $filePath);
    }
    $fichier = new Fichier();
    $fichier->setNom($fileName);
    $fichier->setChemin($filePath);
    //$fichier->setChemin($_POST["prix"]);
    $fichier->setTaille($fileSize);
    $fichier->setType($fileExt);
    echo $fichier;
    // Fichier::ajouter($fichier);
    // $lesProduits=Produit::afficherTous();
    include("vue/fichiers_vue.php") ;
?>