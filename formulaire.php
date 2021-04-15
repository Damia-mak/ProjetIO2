<?php

function affFormulaire(){ ?>
    <form action="index.php" method="post">
        Prénom : <input type="text" name="prenom" size="30" placeholder="Votre prénom." value="" required>
    <br><br>
        Mot de passe : <input type="password" name="passwd" size="16" value="" required>
    <br><br>
        Verifier mot de passe : <input type="password" name="passwd1" size="16" value="" required>
    <br><br>
        Email : <input type="email" name="email" size="30" value="" required>
    <br><br>
        Date : <input type="date" name="date" size="30" value="" required>
    <br><br>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br>
        <input type="radio" id="other" name="gender" value="other">
        <label for="other">Other</label>
    <br><br>
        <select name="sexe" size="1"><option value="homme">Homme</option><option value="femme">Femme</option></select>
    <br><br>
    Enregistrer : <input type="submit" name="Valider" size="1" value="Valider"></form>
    <?php
}
session_start();
// fonction necessaire//
require_once 'fonctionAffichage.php';
entete("Formulaire","Style.css");
affFormulaire();
basDePage();



?>