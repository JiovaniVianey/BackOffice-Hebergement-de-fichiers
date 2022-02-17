 <!-- à retirer une fois les liens et includes terminés -->
 <?php

use function PHPSTORM_META\type;

    include("../head.php");
?>

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

<!-- Button trigger modal -->
<button type="button" class="card-fichier" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color:white; border:none">
            <div class="mx-auto my-auto" href="" data-msg="Ajouter un fichier">
                <span class="fa-solid fa-plus fa-7x basic-color plus"></span> 
            </div>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="uploaded_file">
        
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input class="valide-btn" type="submit" name="submit" value="Valider">
        </form>
      </div>
    </div>
  </div>
</div>

