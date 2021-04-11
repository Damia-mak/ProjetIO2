<?php 
if (str_length($_REQUEST['passwd']) < 6 || $_REQUEST['passwd'] != $_REQUEST['passwd1']) echo "mot de passe incorrecte !",
"<br>","<a href=\"formulaire.php\">Retourner au formulaire ici :)</a>";
else if($_REQUEST['prenom'] == "Votre prénom.") echo "Veuillez inscrire votre prénom",
    "<br>","<a href=\"formulaire.php\">Retourner au formulaire ici :)</a>";
    else echo $_REQUEST['prenom'];
?>