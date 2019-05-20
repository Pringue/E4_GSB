<img src="images/panier.gif"	alt="Panier" title="panier"/>
<img src="images/panier.jpg"	alt="Panier" title="panier"/>
<?php
$prixTotal = 0;
foreach( $lesProduits as $unProduit)
{
  $_SESSION["idP"] = $unProduit["idP"];
  $url ="<a href=index.php?uc=gererPanier&produit=".$unProduit['id']."&idPanier=".$unProduit["idP"]."&action=supprimerUnProduit>supprimer</a>";
  echo "<p><img src='".$unProduit['image']."' alt='image' width=100 height=100/>".$unProduit['description']." ".$unProduit["prix"]."€ quantité : ".$unProduit['quantite'];
  echo " $url</p>";
  $prixTotal += $unProduit["prix"]*$unProduit["quantite"];
}
echo "<br>Prix Total : $prixTotal €";
?>
<br>
<a href=index.php?uc=gererPanier&action=passerCommande>Passer la commande</a>