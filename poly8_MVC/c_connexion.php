<?php

$action = $_REQUEST["action"];
switch ($action)
{
  case 'identification':
  include("vues/v_login.php");
  break;
  
  case 'testIdentification':
  include("vues/v_login.php");
  $id = verifLogin($_REQUEST["login"], $_REQUEST["mdp"]);
  if ($id == null)
  {
    $err = 2;
    include ("vues/v_erreurs.php");
  }
  else
  {
    $_SESSION["id"] = $id[0];
    //header("location:https://jpringue.000webhostapp.com/index.php?uc=gererPanier&action=voirPanier");
    echo "<script>document.location.href = 'https://jpringue.000webhostapp.com/index.php?uc=gererPanier&action=voirPanier'</script>";
  }
  break;

  case 'inscription':
    include 'vues/v_inscription.php';
    break;

  case 'addClient':
    $login = $_POST["login"];
    $mdp = $_POST["mdp"];
    $rmdp = $_POST["rmdp"];    
    if (strcmp($mdp, $rmdp) == 0)
    {
      $verif = verifDispo($login);
      if ($verif["idClient"] != null)
      {
        $err = 4;
        include ("vues/v_erreurs.php");
        include 'vues/v_inscription.php';
      }
      else
      {
        addClient($login, $mdp);
        //header("location:https://jpringue.000webhostapp.com/index.php?uc=voirProduits&action=voirCategories");
        echo "<script>document.location.href = 'https://jpringue.000webhostapp.com/index.php?uc=voirProduits&action=voirCategories'</script>";
      }
    }
    else
    {
      $err = 3;
      include ("vues/v_erreurs.php");
      include 'vues/v_inscription.php';
    }
}
?>
