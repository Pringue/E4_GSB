<?php
$action = $_REQUEST["action"];
switch ($action)
{
  case 'identification':
  include("vues/v_loginAdmin.php");
  break;

  case 'testIdentification':
    $id = verifAdmin($_REQUEST["login"], $_REQUEST["mdp"]);
    if ($id["id"] == null)
    {
      $err = 2;
      include("vues/v_login.php");
      include("vues/v_erreurs.php");
    }
    else
    {
      $lesCategories = getLesCategories();
      include("vues/v_categoriesAdmin.php");
    }
    break;

    case 'voirProduits' :
    $lesCategories = getLesCategories();
    include("vues/v_categoriesAdmin.php");
      $idCategorie = $_REQUEST['idCategorie'];
    $lesProduits = getLesProduits($idCategorie);
    include("vues/v_produitsAdmin.php");
    break;

    case 'supprimer' :
      supprimerProduit($_REQUEST["produit"]);
      $lesCategories = getLesCategories();
    $lesProduits = getLesProduits($_REQUEST["idCategorie"]);
    $idCategorie = $_REQUEST['idCategorie'];
    include("vues/v_categoriesAdmin.php");
    include("vues/v_produitsAdmin.php");
    break;

    case 'modifier' :
        $lesCategories = getLesCategories();
        $produit = getProduit($_REQUEST["produit"]);
        $prod = $_REQUEST["produit"];
        $idCategorie = $_REQUEST['idCategorie'];
        include("vues/v_categoriesAdmin.php");
        include("vues/v_modifierProduit.php");
    break;

    case 'modifierProduit':
        $lesCategories = getLesCategories();
        $prod = $_REQUEST["prod"];
        modifProduit($_REQUEST["desc"], $_REQUEST["prix"], $prod);
        $lesCategories = getLesCategories();
        include("vues/v_categoriesAdmin.php");
        break;

    case 'ajouter':
    $lesCategories = getLesCategories();
        $idCategorie = $_REQUEST['idCategorie'];
        echo $idCategorie;
        include("vues/v_categoriesAdmin.php");
        include("vues/v_ajouterProduit.php");
        break;

    case 'ajouterProduit' :
    $lesCategories = getLesCategories();
    $idCategorie = $_REQUEST['categ'];
    ajoutProduit($_REQUEST["desc"], $_REQUEST["prix"], $_REQUEST["image"], $idCategorie);
    $lesCategories = getLesCategories();
    include("vues/v_categoriesAdmin.php");
    break;
}
?>