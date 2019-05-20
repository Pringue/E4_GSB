<ul id="categories">
<?php
foreach( $lesCategories as $uneCategorie) 
{
	$idCategorie = $uneCategorie["idCategorie"];
	$libCategorie = $uneCategorie["libelle"];
	$url ="<a href=index.php?uc=voirProduits&idCategorie=$idCategorie&action=voirProduits> $libCategorie </a>";
	echo "<li>".$url."</li>\n";
}
?>
</ul>
