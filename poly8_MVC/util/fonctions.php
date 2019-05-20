<?php
function connexion()
{
   $hote="localhost";
   $login="id9643130_root";
   $mdp="root01";
   $db="id9643130_boutique";
   $connexion = new PDO("mysql:host=$hote;dbname=$db", $login, $mdp)or die('Erreur connexion à la base de données');
   return $connexion;
}

function verifDispo($login)
{
	$connexion = connexion();
	$sql = "select idClient from client where pseudoClient = '$login'";
	return $connexion->query($sql)->fetch();
}

function addClient($login, $mdp)
{
	$connexion = connexion();
	$sql = "select Max(idClient) as id from client";
	$resultat = $connexion->query($sql)->fetch();
	$_SESSION["id"] = $resultat["id"]+1;
	$sql = "insert into client (pseudoClient, passwordClient) values ('$login', '$mdp')";
	$connexion->prepare($sql)->execute();
}

function verifLogin($pLogin, $pMdp)
{
  $admin = null;
  $connexion = connexion();
	$requete = "select idClient as id from client where pseudoClient='$pLogin' and passwordClient='$pMdp';";
	$resultat = $connexion->query($requete);
  $admin = $resultat->fetch();
  return $admin;
}

function verifAdmin($login, $mdp)
{
	$admin = null;
	$connexion = connexion();
	$requete = "select idAdmin as id from admin where pseudo='$login' and mdp='$mdp';";
	$resultat = $connexion->query($requete);
  $admin = $resultat->fetch();
  return $admin;
}

function getLesCategories()
{
  $lesCategories = null;
	$connexion = connexion();
	$requete = "select * from categorie";
  $resultat = $connexion->query($requete);
  $lesCategories = $resultat->fetchAll();
	return $lesCategories;
}

function supprimerProduit($produit)
{
	$connexion = connexion();
		$sql = "DELETE FROM produit WHERE idProduit = $produit";
		$connexion->prepare($sql)->execute();
		$sql = "DELETE FROM contenir WHERE idProduit = $produit";
		$connexion->prepare($sql)->execute();
}

function modifProduit($desc, $prix, $prod)
{
	$connexion = connexion();
	$sql = "UPDATE produit SET prix = $prix, description='$desc' WHERE idProduit = $prod";
	$connexion->prepare($sql)->execute();
}

function ajoutProduit($desc, $prix, $image, $categ, $tmp_name)
{
	$connexion = connexion();
	$sql = "select Max(idProduit) as id from produit";
	$resultat = $connexion->query($sql)->fetch();
	$id = $resultat["id"]+1;
	$sql = "insert into produit (idProduit, description, prix, image, idCategorie) values ($id, '$desc', $prix, '$image', '$categ')";
	$connexion->prepare($sql)->execute();

	$dirpath = './';
	$target_file = $dirpath.$image;
	move_uploaded_file($tmp_name, $target_file);
}

 function getLesProduits($uneCategorie)
{
  $lesProduits = null;
	$connexion = connexion();
	$requete ="select * from produit where idCategorie = '$uneCategorie'";
	$resultat = $connexion->query($requete);
  $lesProduits = $resultat->fetchAll();
	return $lesProduits;
}

function getProduit($prod)
{
  $lesProduits = null;
	$connexion = connexion();
	$requete ="select * from produit where idProduit = $prod";
	$resultat = $connexion->query($requete);
  $lesProduits = $resultat->fetch();
	return $lesProduits;
}

function newPanier()
{
	$connexion = connexion();
	$sql = "select Max(idPanier) as id from panier";
	$resultat = $connexion->query($sql)->fetch();
	$_SESSION["idP"] = $resultat["id"]+1;
	$sql = "insert into panier value (".$_SESSION["idP"].", 1, ".$_SESSION["id"].")";
	$connexion->prepare($sql)->execute();
}

function ajouterAuPanier($idProduit, $idPanier)
{	
	$connexion = connexion();
	$requete = "select idProduit from contenir WHERE idPanier = ".$idPanier." and idProduit = $idProduit";
	$resultat = $connexion->query($requete)->fetch();
	if ($resultat != null)
	{
		$sql = "UPDATE contenir SET quantite=quantite+1 WHERE idPanier = ".$idPanier." and idProduit = $idProduit";
		$connexion->prepare($sql)->execute();
	}
	else
	{
		$sql = "insert into contenir value ($idProduit, $idPanier, 1)";
		$connexion->prepare($sql)->execute();
	}
}
function retirerDuPanier($idProduit, $idPanier)
{
	$connexion = connexion();
	$requete = "select quantite from contenir WHERE idPanier = ".$idPanier." and idProduit = $idProduit";
	$resultat = $connexion->query($requete)->fetch();
	if ($resultat["quantite"] == 1)
	{
		$sql = "DELETE FROM contenir WHERE idPanier = ".$idPanier." and idProduit = $idProduit";
		$connexion->prepare($sql)->execute();
	}
	else
	{
		$sql = "UPDATE contenir SET quantite=quantite-1 WHERE idPanier = ".$idPanier." and idProduit = $idProduit";
		$connexion->prepare($sql)->execute();
	}
}
function getLesProduitsDuPanier()
{
	$produits = null;
	$connexion = connexion();
	$requete = "select p.idProduit as id, pa.idPanier as idP, description, quantite, image, prix from contenir c INNER JOIN produit p on p.idProduit = c.idProduit INNER JOIN panier pa on pa.idPanier = c.idPanier where idClient = ".$_SESSION["id"]." and idEtat=1;";
	$resultat = $connexion->query($requete);
  $produits = $resultat->fetchAll();
  return $produits;
}

function creerCommande($nom,$rue,$cp,$ville,$mail)
{
	$connexion = connexion();
	$date=date("Y-m-j");
	$sql = "insert into commande (date, nom, rue, cp, ville, email, idPanier) values ('$date','$nom','$rue','$cp','$ville','$mail', ".$_SESSION["idP"].")";
	$connexion->prepare($sql)->execute();
	$sql = "update panier set idEtat = 2 where idPanier = ".$_SESSION["idP"];
	$connexion->prepare($sql)->execute();
}
function estUnCp($codePostal)
{
   // Le code postal doit comporter 5 chiffres
   return strlen($codePostal)== 5 && estEntier($codePostal);
}

// Si la valeur transmise ne contient pas d'autres caract�res que des chiffres,
// la fonction retourne vrai
function estEntier($valeur)
{
   return !preg_match ("/^[^0-9]./", $valeur);
}
function estUnMail($mail)
{
$regexp="/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i";
return preg_match ($regexp, $mail);
}
function getErreursSaisieCommande($cp,$mail)
{
 $lesErreurs = array();
 if(!estUnCp($cp))
 	$lesErreurs[]= "erreur de code postal";
 if(!estUnMail($mail))
 	$lesErreurs[]= "erreur de mail";
 return $lesErreurs;
}
?>
