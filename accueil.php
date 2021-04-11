<?php
require_once 'fonctionAffichage.php';

entete("accueil","Style.css");
function body($prenom,$nom){
echo "<body>";
echo "<h1>Bienvenue sur ......</h1>
<p>Bonjour je m'appelle $prenom $nom bienvenue!</p>";
echo"<img src=\" \" alt=\"arrow\">";
echo "<li><a href=\"recherche.php\">Recherche</a></li>",
"<li><a href=\"profile.php\">Profile</a></li>";
echo date('d/m/Y')," Heure ",date('H:i');
echo "</body>";
}
body("Ewen","Glasziou");
basDePage();
	
	
?>
	 
