<header>
        <h1>MyFile.com</h1>
        
        <h3>Bienvennue <span class="text-dark" style="text-shadow: 1px 2px 3px #1ac6ff9d;">Tom Bouteselle</span> </h3>
        <div class="d-flex flex-row flex-wrap">
        <?php
            // if (($utilisateur -> getAdmin()) == 1)
            // {
            //     echo '<a href="">Gérer les utilisateurs</a>';
            // }
        ?>
        <a href="index.php?uc=fichier&fich=dossier&affiche=<?php $connectedUser->getId();?>">Mes Fichiers</a>
        <a href="index.php?uc=utilisateur&action=affich">Gérer les utilisateurs</a>
        </div>
        
        
    </header>