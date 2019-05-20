<?php
$nbProduit = getNbProduit();
$nbProduit = $nbProduit['idProduit'] + 1;
echo "<form action='util/ajouter.php' method='post'>";
echo "<input type='hidden' name='id' value=".$nbProduit.">";
echo "<input type='hidden' name='categorie' value=".$_REQUEST['idCategorie'].">";
echo "Nom du produit :";
echo "<input type='text' name='nom' size='50'><br>";
echo "Prix du produit :";
echo "<input type='number' name='prix'><br>";
echo "Photo du produit :";
echo "<input type='file' name='photo'><br>";
echo "<input type='submit' value='Valider'><br>";
echo "</form>";
?>
