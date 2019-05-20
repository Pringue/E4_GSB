<div id="bandeau">
<!-- Images En-t�te -->
<!--<img src="images/menuGauche.gif"	alt="Choisir" title="Choisir"/>-->
<img src="images/boutique.gif"	alt="Boutique" title="Boutique"/>
</div>
<!--  Menu haut-->
<ul id="menu">
	<li><a href="index.php?uc=accueil"> Accueil </a></li>
	<li><a href="index.php?uc=voirProduits&action=voirCategories"> Voir le catalogue </a></li>
	<li><a href="index.php?uc=gererPanier&action=voirPanier"> Voir son panier </a></li>
	<?php
		if ($_SESSION["id"] == null)
		{
			echo '<li><a href="index.php?uc=connexion&action=identification"> Connexion </a></li>';
		}
		else
		{
			echo '<li><a href="index.php?uc=deconnexion"> Deconnexion </a></li>';
		}
	?>
</ul>
