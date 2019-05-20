
<!--  Menu haut-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <a class="navbar-brand" href="#">
    Zoro
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link"href="index.php?uc=accueil" >Accueil <span class="sr-only">(current)</span></a>
      </li>      
	  <li class="nav-item">
        <a class="nav-link"  href="index.php?uc=voirProduits&action=voirCategories" > Voir le catalogue </a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="index.php?uc=gererPanier&action=voirPanier" > Voir son panier</a>
	  </li>
	  <?php
		if ($_SESSION["id"] == null)
		{
			echo '
			<li class="nav-item">
			<a class="nav-link"  href="index.php?uc=connexion&action=identification" > Connexion </a>
		  	</li>';
		}
		else
		{
			echo '
			<li class="nav-item">
			<a class="nav-link"  href="index.php?uc=deconnexion"> Deconnexion </a>
			</li>';
		}
	?>
    </ul>
  </div>
</nav>
<div class="container" style="background-color:#dbdbdb;height:100vh">