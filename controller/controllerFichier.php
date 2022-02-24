<?php
switch($_GET["fich"]){
case "ajouter" :
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
        $fileName = str_replace(' ', '', $_FILES['uploaded_file']['name']);
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
    
    $fichier->setTaille($fileSize);
    $fichier->setType($fileExt);
    echo $fichier;
    // Fichier::ajouter($fichier);
    // $lesFichiers=Fichier::afficherTous();
    include("vue/fichiers_vue.php") ;
    break;
    case "supprimer" :
        $fichier=Fichier::trouverUnFichier($_GET["supp"]);
        Fichier::supprimer($fichier);
        $lesFichiers=Fichier::afficherTous();
        include("vue/fichiers_vue.php") ;
        break;
     case "acceuil" :

            $lesFichiers=Fichier::afficherTous();
            include("vue/fichiers_vue.php") ;
        break;
        case "dossier" :

            $lesFichiers=Fichier::afficherParIdutil($_GET["affich"]);
            include("vue/fichiers_vue.php") ;
        break;
        case "doajouter" :
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
                $fileName = str_replace(' ', '', $_FILES['uploaded_file']['name']);
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
            
            $fichier->setTaille($fileSize);
            $fichier->setType($fileExt);
            echo $fichier;
            // Fichier::ajouter($fichier);
            // $lesFichiers=Fichier::afficherParIdutil($_GET["dos"]);
            include("vue/fichiers_vue.php") ;
            break;
            case "dosupprimer" :
                $fichier=Fichier::trouverUnFichier($_GET["supp"]);
                Fichier::supprimer($fichier);
                $lesFichiers=Fichier::afficherParIdutil($_GET["dos"]);
                include("vue/fichiers_vue.php") ;
                break;
            case "telecharger" :
                $fichier=Fichier::trouverUnFichier($_GET["tel"]);
                file_get_contents($fichier->getChemin());
                $lesFichiers=Fichier::afficherTous();
                include("vue/fichiers_vue.php") ;
                break;
            case "dotelecharger" :
                $fichier=Fichier::trouverUnFichier($_GET["tel"]);
                file_get_contents($fichier->getChemin());
                $lesFichiers=Fichier::afficherParIdutil($_GET["dos"]);
                include("vue/fichiers_vue.php"); 
                $lesFichiers=Fichier::afficherTous();
                include("vue/fichiers_vue.php") ;
            break;
            case "dossier":
                $id = $_GET["id"];
                $lesFichiers=Fichier::afficherParIdutil($id);
            break;
            case"afficheun":
                Fichier::trouverFichier($_GET["??"]);
                include("??");
            break;
}
?>