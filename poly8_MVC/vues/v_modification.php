<?php
//idCategorie id
$produit = getProduit($_REQUEST['produit']);
$image = $produit->getImage();
$nom = $produit->getDescription();
$prix = $produit->getprix();
echo "<form action='util/modification.php' method='post'>";
echo "<img src='".$image."' width='100px' height='100px'>";
echo "<input type='hidden' value='".$_REQUEST["produit"]."' name='id'>";
echo "<input type='text' name='description' value='$nom' size='50'>";
echo "<input type='text' name='prix' value='$prix' size='5'><br>";
echo "<input type='submit' value='Valider la modification'>";
echo "</form>";
?>
