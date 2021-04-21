<?php
session_start();
// fonction necessaire//
require_once 'fonctionAffichage.php';
require_once 'sauvegardeForm.php';
entete("Formulaire","Style.css");
affFormulaire();
//fin
basDePage();


//faire en sorte que les utilisateurs est un nom diffrent.
?>