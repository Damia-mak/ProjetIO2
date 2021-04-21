<?php 
session_start();
require_once 'sauvegardeForm.php';
sauvegarde();
function affValidation(){}
if (strlen($_SESSION['passwd']) < 6 || $_SESSION['passwd'] != $_SESSION['passwd1']) echo "mot de passe incorrecte !",
"<br>","<a href=\"formulaire.php\">Retourner au formulaire ici :)</a>";
else if($_SESSION['prenom'] == "Votre prénom.") echo "Veuillez inscrire votre prénom",
    "<br>","<a href=\"formulaire.php\">Retourner au formulaire ici :)</a>";
    else echo "Bonjour, ",htmlspecialchars($_SESSION['prenom']),
    "<br> Vous etes née le ",$_SESSION['date'],
    "<br>",
    "Votre e-mail est ",$_SESSION['email'],
    "<br>",
    "<a href=\"formulaire.php\">Modifier vos données ici :)</a>";
?>