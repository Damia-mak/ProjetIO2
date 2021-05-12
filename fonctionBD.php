<?php
function connexionBD(){
	//definition des variables nécessaires à la connexion à la bd
	$ip = "127.0.0.1";
	$user = "Ewen";
	$pwd = "Projet-IO2021";
	$bdd = "projet_io";
	//connexion à la bd
	$connex = mysqli_connect($ip,$user,$pwd,$bdd);
	//on test si la connexion a eu lieu correctement
	if(!$connex){
        erreur("Il y a eu une erreur : ".mysqli_error($connex));
	    //on retourne false
        return false;
	}		
	//on retourne la connexion si oui
	return $connex;
}
function InsertUtilBD($connex,$req,&$erreur){
    //$req = “INSERT …INTO …” etc.
    $resultat = mysqli_query($connex, $req);
    if (! $resultat) {
		//Pseudo est unique dans Sql donc si il ni a pas de resultat un utilisateur a déjà le même pseudo 
		$erreur['pseudo']=true;
	}
}

function RequeteBD($connex,$req){
	$resultat = mysqli_query($connex, $req);
    if (! $resultat) {
		return false;
	}
	$tab = mysqli_fetch_assoc ($resultat);
	return $tab['mdp'];
	
}
function supprimerUtilisateur($connex,$pseudo){
	/*
	//avant de supprimer l'utilisateur il faut supprimer ces les message et les photo qu'il a posté 
	//on récupère l'id de l'utilisateur
	$idUser = getIdUser($connexion, $pseudo);

	//la requête récupérant les id des messages appartenant à l'utilisateur
	$req = 'SELECT id FROM msg_prv WHERE id_user1='.$idUser;
	$req2 = 'SELECT id FROM msg_prv WHERE id_user2='.$idUser;

	//on récupère des resultat de la requete
	$sesmdg = RequeteBD($connexion, $req);
	$sesmdg2 = RequeteBD($connexion, $req);
	
	//on supprime les mdg pour chaque id_User trouvé et la conversation ayant cet id
	/*foreach( as $key => $value){
		supprimerCartesJeu($connexion, $sesmsg[$key]["id_user"]); 
		supprimerJeu($connexion,$sesmg[$key]["id_user"]);
	}*/

	//supprime l'utilisateur qui correspond au pseudo
	$req = 'DELETE FROM utilisateur WHERE pseudo =\''.$pseudo.'\';';

	//execution de la requête
	$resultat = mysqli_query($connexion, $req);

	if(!$resultat){
		erreur(" Echec de la suppresion, ".mysqli_error($connexion));
	} else {
		valid("Suppression effectuée ! ");
	}
}
?>