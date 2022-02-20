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
                            <h3 class="card-fichier-text">exemple fichier</h3>
                            <span class="card-fichier-text">date</span>
                            <p class="card-fichier-text">taille fichier</p>
                        </div>
                        <div class="col-md-2 d-flex align-items-center justify-content-center flex-column">
                            <a href=""></a> <span class="py-auto fa-solid fa-download fa-2x basic-color"></span></a>
                            <a href=""></a> <span class="fa-solid fa-trash fa-2x" style="color: #c56d6d;"></span></a>
                        </div>
                    </div>  
                </div>
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
        <button type="button" class="card-fichier" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color:white; border:none">
            <div class="mx-auto my-auto" href="" data-msg="Ajouter un fichier">
                <span class="fa-solid fa-plus fa-7x basic-color plus"></span> 
            </div>
</button>
    </div>
</div>

<!-- à réécrire -->


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un fichier</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../index.php?uc=fichier&fich=ajouter" method="POST" enctype="multipart/form-data">
            <input type="file" name="uploaded_file" required>
        
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <input class="valide-btn" type="submit" name="submit" value="Valider">
        </form>
      </div>
    </div>
  </div>
</div>

