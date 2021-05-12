<?php 
session_start();
//les fonction dont nous avons besoin
require_once 'fonctionAffichage.php';
require_once 'fonctionAuthent.php';
require_once 'fonctionBD.php';
require_once 'fonc_valid.php';
//fonction de mise en page
entete("Formulaire","Style.css?1");

//on verifie que l'utilisateur n'est pas déja connécté.
if(!isset($_SESSION["user"])){
    
    //on teste si l'utilisateur n'est pas encore allez sur la page
    if(empty($_POST["initia"])){
        affFormulaire($erreur);
    }else{    
    $donnees = $_POST;
    $erreur;
    $mdp = $donnees['mdp'];//On en aura besoin pour connectée l'utilisateur directement 

        
        //on regarde si un utilisateur est déjà inscrit avec ce pseudo
        //if(!userExist($connex, $_SESSION["pseudo"])){
        if(verifierRequis ($donnees, $erreur)){
            //On prepare les données en cas d'affichage sur la page html
            preTraiter($donnees);

            //Verifie l'email et la date
            if(BonFormat($donnees, $erreur)){
                //on verifie que les deux mdps correspondent ou qu'il fasse plus de 6 caractères.
                if(verifMDP($donnees['mdp'],$donnees['mdpv'])){
                    //une fois toute les information verifier on the connecte a la BD et on prepare les donnees pour mysql
                    $connex=connexionBD();
                    $donnees["pseudo"] = mysqli_real_escape_string($connex,$donnees["pseudo"]);
                    $donnees["email"] = mysqli_real_escape_string($connex,$donnees["email"]);
                    $donnees["sexe"] = mysqli_real_escape_string($connex,$donnees["sexe"]);
                    $donnees["date"] = mysqli_real_escape_string($connex,$donnees["date"]);
                    $donnees["mdp"] = mysqli_real_escape_string($connex,$donnees["mdp"]);
                    //on prepare la confirmation du mdp verifier aussi au cas où
                    $donnees["mdpv"] = mysqli_real_escape_string($connex,$donnees["mdpv"]);
                    
                    //une fois la preparation des données terminé on insère.
                    $req = 'INSERT INTO utilisateur (Pseudo, Email, mdp, sexe,dateN) VALUES (\''.$donnees["pseudo"].'\',\''.$donnees["email"].'\',\''.$donnees['mdpv'].'\',\''.$donnees["sexe"].'\',\''.$donnees['date'].'\');';
                    InsertUtilBD($connex,$req,$erreur);


                    //Si il y a eu une erreur lors de l'insertion dans la BD c'est que le pseudo est deja pris
                    if(empty($erreur['pseudo'])){
                        //on connecte l'utilisateur automatiquement et on affiche des liens pour aller vers la page d'accueil ou sa page de compte
                        try_connexion($connex, $donnees["pseudo"], $mdp);//ici on utilise "$mdp" pour que le mot de passe ne sois pas hacher.
                        affValidation($donnees);


                    }else{
                        erreur("Ce pseudo est deja pris désolée, veuillez en choisir un autre");
                        affFormulaire($erreur);
                    }


                }else{
                    erreur("Les deux mots de passe ne sont pas identique ou font moins de 6 caractères !","<br>","<a href=\"formulaire.php\">Retourner au formulaire ici :)</a>");
                    affFormulaire($erreur);
                }


            }else{
                if(!empty($erreur['email'])){
                    erreur("Votre email n'est pas valide");
                }


                if(!empty($erreur['date'])){
                    erreur("Votre date de naissance n'est pas valide");
                }


                affFormulaire($erreur);
            }


        }else{ //si les cases requise ne sont pas remplie on retourne au questionnaire
            affFormulaire($erreur);
            //header('location: /IO_Projet/formulaire.php');
        }


    }


}else{
    header('location: /IO_Projet/accueil.php');
}

//fin de la page 
basDePage();
?>