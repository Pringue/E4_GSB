<ul  style="list-style-type:none;">
<?php
foreach( $lesCategories as $uneCategorie) 
{
	$idCategorie = $uneCategorie["idCategorie"];
	$libCategorie = $uneCategorie["libelle"];
	$url ="<a href=index.php?uc=voirProduits&idCategorie=$idCategorie&action=voirProduits style='color:black;' > $libCategorie </a>";
	echo "<li>".$url."</li>\n";
}
?>
</ul>
