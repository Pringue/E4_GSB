<div id="produits">
<?php
	
foreach( $lesProduits as $unProduit) 
{
  $confirm = "Are you sure?";
  $id = $unProduit["idProduit"];
  $description = $unProduit["description"];
  $image = $unProduit["image"];
  $prix = $unProduit["prix"];
  echo "<ul>
	<li><img src='".$image."' alt='image' width='100px' height='100px' /></li>
	<li>$description</li>
        <li>$prix</li>
        <li><a href='index.php?uc=administration&idCategorie=$idCategorie&produit=$id&action=supprimer'>Supprimer</a></li>
        <li><a href='index.php?uc=administration&idCategorie=$idCategorie&produit=$id&action=modifier'>Modifer</a></li>
	</ul>
	";
}
echo "<a href='index.php?uc=administration&idCategorie=$idCategorie&&action=ajouter'>Ajouter</a>"
?>
</div>
