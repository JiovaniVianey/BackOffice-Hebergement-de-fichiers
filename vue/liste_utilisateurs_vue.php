 <!-- à retirer une fois les liens et includes terminés -->
 <?php
    include("../head.php");
?>

<div class="wrapper">
<?php
    include("header.php");
    ?>
<table class="table table-striped">
  <thead>

    <!-- deux lignes d'exemple -->
    <tr>
      <th scope="col">#</th>
      <th scope="col">Prénom</th>
      <th scope="col">Nom</th>
      <th scope="col">Email</th>
      <th scope="col">Dèrnière IP</th>
      <th scope="col">Ajout de fichiers</th>
      <th scope="col">Suppression de fichiers</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>blablabla@bloblo.com</td>
      <td>@mdo</td>
      <td><input type="checkbox"></td>
      <td><input type="checkbox"></td>
      <td><a href="">Supprimer l'utilisateur</a></td>
    </tr>
    

    <!-- faut faire un form avec la boucle à l'interieur. -->
    <!-- mettre un input type=checkbox, la Value sera composer de l'$id de l'utilisateur de la liste pr savoir quel input concerne quel utilisateur en back-end-->
    
    <?php
        foreach ($lesUtilisateurs as $uti)
        {
            ?>
              <tr>
                <th scope="row"><?php echo $uti -> getId(); ?></th>
                <td><?php echo $uti -> getPrenom(); ?></td>
                <td><?php echo $uti -> getNom(); ?></td>
                <td><?php echo $uti -> getEmail(); ?></td>
                <td><?php echo $uti -> getIp(); ?></td>
                <td><?php echo $uti -> getAjout(); ?></td>
                <td><?php echo $uti -> getSup(); ?></td>
              </tr>

                         
            <?php
        }
    ?>

  
  </tbody>
</table>
</div>

