<div id="modif">
  <?php
  echo "Ajouter Produit<br><br>";
  echo "<form action='index.php?uc=administration&categ=$idCategorie&action=ajouterProduit' method='post' enctype='multipart/form-data'>";
  echo "Description :<input type='text' name='desc'><br>";
  echo "prix :<input type='text' name='prix'><br>";
  echo "Image :<input type='file' name='image' id='image'><br>";
  echo "<input type='submit' value='Valider'>";
  echo "<form>";
  ?>
</div>