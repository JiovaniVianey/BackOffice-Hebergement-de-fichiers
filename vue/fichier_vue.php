 <!-- à retirer une fois les liens et includes terminés -->
<?php
    include("../head.php");
?>

<div class="wrapper">
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
        <span class="mx-auto my-auto fa-solid fa-plus fa-7x basic-color"></span> 
    </div>
    

    
    


    
</div>

<!-- à réécrire -->
<?php
        foreach ($lesFichiers as $fichier)
        {
            ?>
                
            <div class="card bg-grey" style="width: 15rem;">
                <img src="<?php echo $produit -> getPhoto() ?>" class="card-img-top" alt="...">
                <div class="card-body text-dark">
                    <h5 class="card-title"><?php echo $produit -> getNom() ?></h5>
                        <div class='card-footer bg-light'>
                            <p class="card-text"><?php echo $produit -> getPrix() ?></p>
                            <a href="panier.php?id=<?php $produit -> getId() ?>" class="btn btn-warning bg-gradient">Ajouter au panier</a>
                        </div>
                    </div>
                </div>

                         
            <?php
        }
    ?>