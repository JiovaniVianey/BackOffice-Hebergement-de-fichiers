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
    <tr>
      <th scope="col">#</th>
      <th scope="col">Prénom</th>
      <th scope="col">Nom</th>
      <th scope="col">Dèrnière IP</th>
      <th scope="col">Autorisation fichiers</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td><input type="checkbox"></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td><input type="checkbox"></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
      <td><input type="checkbox"></td>
    </tr>
  </tbody>
</table>
</div>


<?php
        foreach ($lesUtilisateurs as $uti)
        {
            ?>
              <tr>
                <th scope="row"><?php echo $uti -> getId(); ?></th>
                <td><?php echo $uti -> getPrenom(); ?></td>
                <td><?php echo $uti -> getNom(); ?></td>
                <td><?php echo $uti -> getIp(); ?></td>
                <td><?php echo $uti -> getId(); ?></td>
              </tr>

                         
            <?php
        }
    ?>