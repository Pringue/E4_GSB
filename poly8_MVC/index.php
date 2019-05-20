<?php
include("util/fonctions.php");
session_start();
include("vues/v_entete.php") ;
include("vues/v_bandeau.php") ;
if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
	 $uc = $_REQUEST['uc'];
switch($uc)
{
	case 'accueil': 
					include("vues/v_accueil.php");
					break;
	case 'voirProduits' :
					include("c_voirProduits.php");
					break;
	case 'gererPanier' :
					if ($_SESSION["id"] != null)
					{
						include("c_gestionPanier.php");
					}
					else
					{
						//header('Location: index.php?uc=administrer&action=identification'); 
						echo "<script>document.location.href = 'https://jpringue.000webhostapp.com/index.php?uc=connexion&action=identification'</script>";
					}
					break; 
	case 'connexion' :
					include("c_connexion.php");
					break; 
	case 'deconnexion' :
					$_SESSION["id"] = null;
					$_SESSION["idP"] = null;
					//header('Location: index.php?uc=accueil'); 
					echo "<script>document.location.href = 'https://jpringue.000webhostapp.com/index.php?uc=accueil'</script>";
					break;
	case 'administration' :
					include("c_admin.php");
					break;
}
include("vues/v_pied.php") ;
?>

