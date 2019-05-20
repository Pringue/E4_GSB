<ul>
  <?php
  if ($err == 1)
  {
    foreach($msgErreurs as $erreur)
    {
     echo "<li>$erreur</li>";
     }
  }
  else if ($err == 2)
  {
    echo "Login ou Mot de passe incorrect.";
  }
  else if ($err == 3)
  {
    echo "Les mots de passe ne sont pas identique.";
  }
  else if ($err = 4)
  {
    echo "Login déjà utilisé";
  }
  ?>
</ul>
