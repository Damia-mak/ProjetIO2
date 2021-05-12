<?php
//Requis pour l'inscription :
$REQUIS["pseudo"] = true;
$REQUIS["mdp"] = true;
$REQUIS["mdpv"] = true;
$REQUIS["email"] = true;
$REQUIS["sexe"] = true;
$REQUIS["date"] = true;


//Fonction pour le formulaire d'inscription : //
function TraiterChamp($champ) {
    if (!empty($champ)) {
        $champ = trim($champ);
        $champ = htmlspecialchars($champ);
    }
    return $champ;
}
function preTraiter(&$donnees) {
    $donnees["pseudo"] = TraiterChamp($donnees["pseudo"]);
    $donnees["email"] = TraiterChamp($donnees["email"]);
    $donnees["sexe"] = TraiterChamp($donnees["sexe"]);
    $donnees["date"] = TraiterChamp($donnees["date"]);
    $donnees["mdp"] = TraiterChamp($donnees["mdp"]);
    $donnees["mdpv"] = TraiterChamp($donnees["mdpv"]);
}
function verifierRequis (&$donnees, &$erreur) {
    global $REQUIS;
    $ok = true;
    foreach ($REQUIS as $champ => $valeur) {
        if (empty($donnees[$champ])) {
            $erreur["empty_".$champ] = true;
            $ok = false;
        }
    }
    return $ok;
}
//Fonctions de validation de l'email et de la date : 
function emailValide($email){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}
function dateValide($date){ //trouver sur internet
    $date_format_correct = DateTime::createFromFormat('Y-m-d', $date);
    return $date_format_correct && $date_format_correct->format('Y-m-d') === $date;
}


//Permet de verifier que la date et l'email sont au bon format
function BonFormat(&$donnees, &$erreur){
    $ok = true;
    if(!emailValide($donnees['email'])){
        $erreur['email']=true;
        $ok=false;
    }
    if(!dateValide($donnees['date'])){
        $erreur['date']=true;
        $ok=false;
    }
    return $ok;
}


function verifMDP(&$mdp,&$mdpv){
    if (strlen($mdp) >= 6 && (strcmp($mdp,$mdpv) === 0)){
        $mdp = password_hash($mdp, PASSWORD_DEFAULT);
        $mdpv= password_hash($mdpv, PASSWORD_DEFAULT);
        //$donnees['mdp'] = password_hash($donnees['mdp'], PASSWORD_DEFAULT);
        //$donnees['mdpv']= password_hash($donnees['mdpv'], PASSWORD_DEFAULT);
        return true;
    }else{
        return false;
    }
}

?>