<?php
function affFormulaire(){ ?>
    <form action="test.php" method="post">
    Prénom : <input type="text" name="prenom" size="30" value="Votre prénom.">
    <br><br>
    Mot de passe : <input type="password" name="passwd" size="16">
    <br><br>
    Verifier mot de passe : <input type="password" name="passwd1" size="16">
    <br><br>
    <select name="sexe" size="1"><option value="homme">Homme</option><option value="femme">Femme</option></select>
    <br><br>
    Enregistrer : <input type="submit" name="Valider" size="1" value="Valider"></form>
    <?php
}
// fonction necessaire//
require_once 'fonctionAffichage.php';
entete("Formulaire","Style.css");
affFormulaire();
basDePage();



?>