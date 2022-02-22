<header>
        <h1>MyFile.com</h1>
        
        <h3>Bienvennue <span class="text-dark" style="text-shadow: 1px 2px 3px #1ac6ff9d;"><?php  echo $utilisateur -> getNom();?></span> </h3>
        <div class="d-flex flex-row flex-wrap">
        <?php
            if ($utilisateur -> getDroitModif())
            {
                echo '<a href="">Mes Fichiers</a>';
            }
            if ($utilisateur -> getAdmin())
            {
                echo '<a href="">Gérer les utilisateurs</a>';
            }
        ?>
        </div>
        
        
    </header>