<?php

require_once("class/panier.inc.php");
require_once("class/produit.inc.php");
require_once("class/categorie.inc.php");
include("util/fonctions.php");
session_start();
include("vues/v_entete.php") ;
include("vues/v_bandeau.php") ;
if(!isset($_REQUEST['action']))
     $action = 'accueil';
else
  $action = $_REQUEST['action'];
switch($action)
{
  case 'modification': $lesCategories = getLesCategories();
                       include("vues/v_categoriesAdmin.php");
                       include("vues/v_modification.php");
                       break;
  case 'supprimer':    $lesCategories = getLesCategories();
                       include("vues/v_categoriesAdmin.php");
                       include("vues/v_supprimer.php");
                       break;
  case 'ajouter':      $lesCategories = getLesCategories();
                       include("vues/v_categoriesAdmin.php");
                       include("vues/v_ajouter.php");
  break;
}
include("vues/v_pied.php");
?>
