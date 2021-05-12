<?php
// On verifie si un utilisateur possède ce pseudo (non sensible à la casse) cela ne pause pas probleme
function userExist($connex,$pseudo){

    //la requete qui recupere l'utilisateur ayant le meme pseudo (non sensible à la casse)
    $req = "SELECT * FROM utilisateur WHERE Pseudo = '$pseudo'";

    //on recupere le resultat de la requete
    $resultat = mysqli_query($connex, $req);
    if (! $resultat) {
		return false;
	}
	return true;
}
//Prend un Pseudo(le login) et un mdp en argument et tente de connecter l'utilisateur
	function try_connexion($connex,$pseudo,$mdp){

		//On verifie que les deux champs ont bien été remplis
		if(!(empty($pseudo) || empty($mdp))){

			//On va vérifier que l'utilisateur existe
			//On prepare ensuite le pseudo pour la recherche dans la base de donnée
			$pseudo = mysqli_real_escape_string($connex, $pseudo);

			//si l'utilisateur existe on continu
			if(userExist($connex,$pseudo)){

				//On doit vérifier que le mdp renseigné correspond à celui de la bdd

				//on recupère donc le mdp de la bdd à partir du pseudo renseigné
				//la requête pour le mot de passe
				$req = "SELECT mdp FROM utilisateur WHERE Pseudo='".$pseudo."';";

				//etant donné qu'on empeche la création de deux utilisateurs
                //avec le meme pseudo on peut directement enregistre le mdp
                
				//le mot de passe figurant dans la bdd
				$mdpBD = RequeteBD($connex,$req);
				//on test alors si les mots de passe correspondent
				if(password_verify($mdp,$mdpBD)){
					//test validé, on connecte l'utilisateur
					$_SESSION["user"] = $pseudo;
					
				//si les mots de passe ne correspondent pas
				} else {
					//on affiche un message d'erreur
					erreur("Ce n'est pas le bon mot de passe !");
					affFormuConnex();
				}

			//si il n'existe pas
			} else {
				//on affiche un message d'erreur et un lien vers la page d'inscription
				erreur("Vous n'êtes pas inscrit ! <br><br>");
				?> <a href="inscription.php">Cliquer ici pour vous inscrire ! </a> <br><br><?php
			}

		//login ou mdp est vide	
		} else {
			erreur("Veuillez renseigner les deux champs pour vous connecter !");
		}
	}

//Test si l'utilisateur est connecté et affiche un lien vers la page de connexion si il ne l'est pas
function bloquerSansLogin(){
	if(!isset($_SESSION["user"])){
		erreur("Vous devez être connecté pour accéder à cette page ! <br><br>"); ?>
        <p>
	        <a href="connexion.php">Cliquez ici pour vous connecter.</a>
            <br><br>
	        Vous n'avez pas de compte?<a href="FormInscription.php"> Cliquez ici pour vous inscrire.</a> 
        </p>
        <?php
	    //si il n'est pas connecté on retourne false
	    return false;
	} else {
        //si il est connecté on retourne true 
		return true;
	}
}
?>