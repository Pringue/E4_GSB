<?php

$action = $_REQUEST['action'];
switch($action)
{
	case 'voirPanier':
		$lesProduits = getLesProduitsDuPanier();
		include("vues/v_panier.php");
		break;
	case 'supprimerUnProduit':
		$idProduit=$_REQUEST['produit'];
		$idPanier=$_REQUEST['idPanier'];
		retirerDuPanier($idProduit, $idPanier);
		$lesProduits = getLesProduitsDuPanier();
		include("vues/v_panier.php");
		break;
	case 'passerCommande' :
		$nom ='';$rue='';$ville ='';$cp='';$mail='';
		include ("vues/v_commande.php");
		break;
	case 'confirmerCommande':	
		$nom =$_REQUEST['nom'];$rue=$_REQUEST['rue'];$ville =$_REQUEST['ville'];$cp=$_REQUEST['cp'];$mail=$_REQUEST['mail'];
		$msgErreurs = getErreursSaisieCommande($cp,$mail);
        if (count($msgErreurs)!=0)
        {
            $err = 1;
			include ("vues/v_erreurs.php");
			include ("vues/v_commande.php");
        }
		else {
			creerCommande($nom,$rue,$cp,$ville,$mail );
			$_SESSION["idP"] = null;
			echo "La commande est prise en compte";
		}
		break;	
}
?>


