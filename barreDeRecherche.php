<?php

function barrederecherche(){ ?>/formulaire de recherche 
    <form action="...." method="get">
    Recherche : <input type="search" name="recherche" placeholder="Rechercher des nouveaux comptes">
    Envoyer : <input type="submit" name="envoyer"></form>
     <?php
}

function Recup_pseudo($connex){ 
  $req = "select*from Pseudo"; //les id
  $users= mysqli_query($connex,$req);
  if(!$users){
    page_erreur(ERR_REQUETE, mysqli_error($connex)); exit;
     //fermer mysqli
    echo mysqli_connect_error($connex);
  }
  return $users;
}
function connexion_bd(){
  $serveur = "192.168.64.2";
  $login = "Damia";
  $mdp= "root";
  $base= "root";
  $connex=mysqli_connect($serveur,$login,$mdp,$base);//connection à la base de donnée 
  if (!$connex){
    page_erreur(ERR_CONNEX, mysqli_connect_error($connex)); exit;
    echo mysqli_connect_error($connex);
  }
  return $connex;
} 
if(isset($_GET['recherche'])AND!empty($_GET['recherche']))//verifier si utilisateur a bien lancer sa recherche  
$recherche = htmlspecilalchars($$_GET['recherche']); // stocker la recherche dans une variable et échapper les caractères spéciaux 
$users =$users->query('SELECT pseudo FROM users WHERE pseudo LIKE "%'.$recherche.'%"');


//chercher les pseudo qui ressemblent à la recherche 
function pasdutilisateurs(){
  if(mysqli_num_rows($users)>0){
  //s'il existe des utilisateurs avec la lettre/pseudo les afficher 
    While($user=$users->fetch()){//fetch permet de récupérer les données 
      ?>
      <p><?php echo $user['pseudo']?></p>//afficher les pseudo / ou faire une page users pour afficher les pseudo
      <?php // faire un header vers la page de profil de l'utilisteur    
    }
  }else{
  erreur("Aucun compte trouvé");
  }
}
require_once 'fonctionAffichage.php';
entete("rechercher des utilisateurs","Style.css");
barrederecherche();
$connex=mysqli_connect($serveur,$login,$mdp,$base);//connection à la base de donnée  
mysqli_free_result($resultat);
mysqli_close($connex);
pasdutilisateurs();

basDePage();	
?>