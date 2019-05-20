<div id="modif">
  <?php
  echo "Ajouter Produit<br><br>";
  echo "<form action='index.php?uc=administration&categ=$idCategorie&action=ajouterProduit' method='post'>";
  echo "Description :<input type='text' name='desc'><br>";
  echo "prix :<input type='text' name='prix'><br>";
  echo "Image :<input type='file' name='image'><br>";
  echo "<input type='submit' value='Valider'>";
  echo "<form>";
  ?>
</div>