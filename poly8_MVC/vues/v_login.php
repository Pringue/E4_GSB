<div id="login">
  <?php
  echo "<form action='index.php?uc=connexion&action=testIdentification' method='post'>";
  echo "Login :<br><input type='text' name='login'><br>";
  echo "Mot de passe :<br><input type='password' name='mdp'><br><br>";
  echo "<input type='submit' value='Valider'> <input type='button' value='Incription' id='inscription'>";
  echo "<form>";
  ?>
</div>
<script>
  var btnIns = document.getElementById("inscription");
  btnIns.addEventListener("click", function(){
    window.location.href = 'index.php?uc=connexion&action=inscription';
});
</script>
