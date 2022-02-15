 <!-- à retirer une fois les liens et includes terminés -->
<?php
    include("../head.php");
?>

<div class="wrapper">
    <header>
        <h1>MyFile.com</h1>
        <?php 
        // echo $utilisateur -> getNom();
         ?>
        <h3>Bienvennue <span class="text-dark" style="text-shadow: 1px 2px 3px #1ac6ff9d;"> Tom Bouteselle</span> </h3>
        <?php
            // if ($utilisateur -> getDroitModif())
            // {
            //     echo '<a href="">Mes Fichiers</a>';
            // }
            // if ($utilisateur -> getAdmin())
            // {
            //     echo '<a href="">Gérer les utilisateurs</a>';
            // }
        ?>
        <div class="d-flex flex-row flex-wrap">
        <a href="">Mes Fichiers</a>
        <a href="">Gérer les utilisateurs</a>
        </div>
        
        
    </header>
    <div class="fichiers-section">
        <nav>
            <form action="post">
                <input type="search">
                <button>Filtrer</button>
            </form>
        </nav>
        <div class="card-fichier">
            <img class="fichier-img my-2" src="../images/fileicon.png" alt="icon de fichier">
            <div class="row">
                <div class="col-md-9">
                    <h3 class="card-fichier-text">Nom du fichier</h3>
                    <p class="card-fichier-text">Auteur du fichier</p>
                    <span class="card-fichier-text">date du fichier</span>
                    <p class="card-fichier-text">taille du fichier</p>
                </div>
                <div class="col-md-2 d-flex align-items-center ">
                    <a href=""></a> <span class="py-auto fa-solid fa-download fa-3x basic-color"></span></a>
                </div>
            </div>  
        </div>
        <div class="card-fichier">
            <img class="fichier-img my-2" src="../images/fileicon.png" alt="icon de fichier">
            <div class="row">
                <div class="col-md-9">
                    <h3 class="card-fichier-text">Nom du fichier</h3>
                    <p class="card-fichier-text">Auteur du fichier</p>
                    <span class="card-fichier-text">date du fichier</span>
                    <p class="card-fichier-text">taille du fichier</p>
                </div>
                <div class="col-md-2 d-flex align-items-center ">
                    <a href=""></a> <span class="py-auto fa-solid fa-download fa-3x basic-color"></span></a>
                </div>
            </div>  
        </div>
        <div class="card-fichier">
            <img class="fichier-img my-2" src="../images/imageicon.png" alt="icon de fichier">
            <div class="row">
                <div class="col-md-9">
                    <h3 class="card-fichier-text">Nom du fichier</h3>
                    <p class="card-fichier-text">Auteur du fichier</p>
                    <span class="card-fichier-text">date du fichier</span>
                    <p class="card-fichier-text">taille du fichier</p>
                </div>
                <div class="col-md-2 d-flex align-items-center ">
                    <a href=""></a> <span class="py-auto fa-solid fa-download fa-3x basic-color"></span></a>
                </div>
            </div>  
        </div>
        
        <div class="card-fichier">
            <a class="mx-auto my-auto" href="" data-msg="Ajouter un fichier">
                <span class="fa-solid fa-plus fa-7x basic-color plus"></span> 
            </a>
        </div>
    </div>
</div>

<!-- à réécrire -->
<?php
        foreach ($lesFichiers as $fichier)
        {
            ?>
                <div class="card-fichier">
                    <img class="fichier-img my-2" src="../images/fileicon.png" alt="icon de fichier">
                    <div class="row">
                        <div class="col-md-9">
                            <h3 class="card-fichier-text"><?php echo $fichier -> getNom() ?></h3>
                            <p class="card-fichier-text"><?php echo $fichier -> getAuteur() ?></p>
                            <span class="card-fichier-text"><?php echo $fichier -> getDate() ?></span>
                            <p class="card-fichier-text"><?php echo $fichier -> getTaille() ?></p>
                        </div>
                        <div class="col-md-2 d-flex align-items-center ">
                            <a href=""></a> <span class="py-auto fa-solid fa-download fa-3x basic-color"></span></a>
                        </div>
                    </div>  
                </div>

                         
            <?php
        }
    ?>