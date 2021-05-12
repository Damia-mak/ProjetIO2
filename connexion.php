<?php
//les fonctions dont nous avons besoin :
require_once 'fonctionAffichage.php';
require_once 'fonctionBD.php';
require_once 'fonctionAuthent.php';

//On lance la session
session_start();

//on se connecte à la BD
$connex = connexionBD();

//On met en place la page html et le css
entete("Connexion","Style.css");

//On teste si l'utilisateur est dejà connecter
if(!isset($_SESSION["user"])){
    //On verifie qu'il a déja envoyer le formulaire 1 fois
    if(!isset($_POST['connexion'])){
        //Si non on affiche le formulaire
        affFormuConnex();
    }else{
        //Si oui on tente de le connecter mais avant on recupère les données
        $login = $_POST['login'];//appeler login pour faire la difference avec 'pseudo' de l'inscription
        $mdp = $_POST['mdp_connex'];

        try_connexion($connex,$login,$mdp);
        header('location: /IO_Projet/accueil.php');
    }
}else{
    //si la session est encore ouverte il est automatiquement renvoyer vers la page d'accueil.
    header('location: /IO_Projet/accueil.php');
}

//On finis la page html
basDePage();
?>