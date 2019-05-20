<div id="modif">
  <?php
  echo "Modification Produit<br><br>";
  echo "<p><form action='index.php?uc=administration&categ=$idCategorie&prod=$prod&action=modifierProduit' method='post'>";
  echo "Description :<br><input type='text' name='desc' value='".$produit["description"]."'><br>";
  echo "prix :<br><input type='text' name='prix' value='".$produit["prix"]."'><br>";
  echo "<input type='submit' value='Valider'>";
  echo "<form></p>";
  ?>
</div>