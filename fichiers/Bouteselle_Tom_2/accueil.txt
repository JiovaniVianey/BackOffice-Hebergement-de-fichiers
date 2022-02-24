

<div class="wrapper">
    <?php
        include("header.php");
    ?>
    <div class="fichiers-section">
        <nav>
            <form action="post">
                <input type="search">
                <button>Filtrer</button>
            </form>
        </nav>
        <a href="">
            <div class="card-dossier">
                <img class="dossier-img my-2" src="images/folder-img.png" alt="icon de fichier">
                <div class="row">

                        <h3 class="card-fichier-text">Nom du propriétaire</h3>

                </div>  
            </div>
        </a>
    </div>
</div>

<!-- à réécrire -->
<?php
        foreach ($lesDossiers as $dossier)
        {
            $nom_dossier = $dossier -> getNom()." ".$dossier -> getPrenom();
            $id_user = $dossier -> getIdutil();
            ?>
                <a href="controllerFichier.php?fich=dossier&idutil=<?php echo $id_user;?>">
                    <div class="card-dossier">
                        <img class="dossier-img my-2" src="../images/folder-img.png" alt="icon de fichier">
                        <div class="row">
                                <h3 class="card-fichier-text"><?php echo $nom_dossier; ?></h3>
                        </div>  
                    </div>
                </a>

                         
            <?php
        }
    ?>