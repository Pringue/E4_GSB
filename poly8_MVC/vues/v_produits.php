<div id="produits">
<?php
	
foreach( $lesProduits as $unProduit) 
{
  $id = $unProduit["idProduit"];
  $description = $unProduit["description"];
  $image = $unProduit["image"];
  $prix = $unProduit["prix"];
  $url ="<a href=index.php?uc=voirProduits&idCategorie=$idCategorie&produit=$id&action=voirProduitsEtAjouterAuPanier>commander</a>";
  echo "<ul>
	<li><img src='".$image."' alt='image' width='100px' height='100px' /></li>
	<li>$description</li>
	<li>$url</li>
        <li>$prix</li>
	</ul>
	";
}
?>
</div>
