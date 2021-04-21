<?php

function affFormulaire(){ ?>
<div class="FormInscription"> 
    <h1> Inscription : </h1>
    <form action="index.php" method="post">
        Prénom : <input type="text" name="prenom" placeholder="Votre prénom." value="" autocomplete="off" required>
    <br><br>
        Mot de passe : <input type="password" name="passwd" value="" required>
    <br><br>
        Verifier mot de passe : <input type="password" name="passwd1" value="" required>
    <br><br>
        Email : <input type="email" name="email" value="" required>
    <br><br>
        Date : <input type="date" name="date" value="" required>
    <br><br>
    Vous êtes : 
    <br>
        <input type="radio" id="male" name="sexe" value="Homme">
        <label for="Un homme">Male</label><br>
        <input type="radio" id="female" name="sexe" value="Femme">
        <label for="Une femme">Female</label><br>
        <input type="radio" id="other" name="sexe" value="autre">
        <label for="Autre">Other</label>
    <br><br>
    <!--enrgistrement et réinitialisation --> 
        <input type="submit" name="Valider" value="Valider">
        <input type="reset"></form>
</div>        
    <?php
}
function affFormuConnexion(){ ?>
<div class="FormConnexion"> 
    <form action="connexion.php" method="post">
    Email : <input type="email" name="email" autocomplete="off" required>
    <br><br>
    Mot de passe : <input type="password" name="passwd" autocomplete="off" required>
    <br><br>
    <!--enrgistrement et réinitialisation --> 
    <input type="submit" name="connexion" value="Valider">
    <input type="reset"></form>
</div>        
<?php
}
function sauvegarde(){
$_SESSION['prenom']=$_POST['prenom'];
$_SESSION['passwd']=$_POST['passwd'];
$_SESSION['passwd1']=$_POST['passwd1'];
$_SESSION['sexe']=$_POST['sexe'];
$_SESSION['email']=$_POST['email'];
$_SESSION['date']=$_POST['date'];
}

?>