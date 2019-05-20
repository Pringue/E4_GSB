<?php
    echo "<form action='index.php?uc=administrer&action=addClient' method='post'>";
    echo "Login :<br><input type='text' name='login'><br>";
    echo "Mot de passe :<br><input type='password' name='mdp'><br>";
    echo "Retepez le mot de passe : <br><input type='password' name='rmdp'><br><br>";
    echo "<input type='submit' value='Valider'>";
    echo "<form>";
?>