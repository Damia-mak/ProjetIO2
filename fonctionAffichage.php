<?php
//fonction de base pour le html
function entete($titre,$css){
echo "<!DOCTYPE>","\n";
echo "<html lang=\"fr\">","\n";
echo "<head>";
echo "<meta charset=\"utf-8\">","\n";
echo "<link rel=\"stylesheet\" href=\"$css\">","<title>$titre</title>","</head>","\n";
echo "<body>","\n";
}
function basDePage(){
    echo "</body>","\n";
    echo " </html>","\n";
}
function erreur($message_erreur){ ?>
    <div class='erreur'>
        <?php echo $message_erreur; ?>
    </div>
    <?php
}
function try_login ($login, $mdp){
    if (isset($login) && login_valid($login, $mdp) && !isset($_SESSION["user"])){
        $_SESSION["user"] = $login;
        //transfère aux autres pages l'info "login réussi"
    }
}



//Fonction de navigation :
function menu(){ ?>
    <div class='menu'>
    <h1>Nom du site</h1>
        <!--inseré le barre de recherche-->
        <a href=accueil.php id="1">Acceuil</a>
        <a href=profil.php id="2">Profil</a>
        <a href=deconnexion.php id="3">Deconnexion</a>
    </div> 
<?php    
}


//Fonction d'affichage des formulaire :
//Formulaire d'inscription :
function affFormulaire(&$erreur){ ?>
    <div class="FormInscription"> 
        <h1> Inscription : </h1>
        <form action="formInscription.php" method="post">
            Pseudo : <input type="text" name="pseudo" placeholder="Votre pseudo." <?php if(!empty($_POST['pseudo'])){sauvData($_POST['pseudo']);}?> autocomplete="on" >
            <?php if(!empty($erreur["empty_pseudo"]) && !empty($_POST['initia'])){ erreur("Il vous faut un pseudo.");} //sert si on supprimerai les required//?>
        <br><br>
            Mot de passe : <input type="password" name="mdp" autocomplete="off" >
            <?php if(!empty($erreur["empty_mdp"]) && !empty($_POST['initia'])){ erreur("Il vous faut un mot de passe.");} ?>
        <br><br>
            Verifier mot de passe : <input type="password" name="mdpv"  autocomplete="off" >
            <?php if(!empty($erreur["empty_mdpv"]) && !empty($_POST['initia'])){ erreur("Vous devez comfirmez votre mot de passe.");} ?>
        <br><br>
            Email : <input type="email" name="email" <?php if(!empty($_POST['email'])){sauvData($_POST['email']);}?>>
            <?php if(!empty($erreur["empty_email"]) && !empty($_POST['initia'])){ erreur("Il vous faut un email.");} ?>
        <br><br>
            Date : <input type="date" name="date" <?php if(!empty($_POST['date'])){sauvData($_POST['date']);}?> min="01/01/1919" max="" >
            <?php if(!empty($erreur["empty_date"]) && !empty($_POST['initia'])){ erreur("Rentrez votre date de naissance 'JJ/MM/AAAA'.");} ?>
        <br><br>
        Vous êtes : 
        <br>
        <?php if(!empty($erreur["empty_sexe"]) && !empty($_POST['initia'])){ erreur("Il faut cochez une des options !.");} ?>
            <input type="radio" id="Homme" name="sexe" value="Homme" <?php if(isset($_POST['sexe'])){savechecked($_POST['sexe'],"Homme");}?>>
            <label for="Homme">Un homme</label><br>
            <input type="radio" id="Femme" name="sexe" value="Femme"  <?php if(isset($_POST['sexe'])){savechecked($_POST['sexe'],"Femme");}?>>
            <label for="Femme">Une femme</label><br>
            <input type="radio" id="Autre" name="sexe" value="Autre" <?php if(isset($_POST['sexe'])){savechecked($_POST['sexe'],"Autre");}?>>
            <label for="Autre">Autre</label>
        <br><br>
        <!--enrgistrement et réinitialisation --> 
            <input type="hidden" name="initia" value="1">  
            <input type="submit" name="Valider" value="Valider">
            <input type="reset"></form>
        <br><br>
        <a href=connexion.php>Si vous possèdez déjà un compte cliquer ici !</a>
    </div>        
    <?php
}
function savechecked($checked,$value){
    if ($checked == $value){
        echo "checked";
    }
}

function sauvData($data){
        echo "value=\"".htmlspecialchars($data)."\"";
}
function affValidation($donnees){
    echo "Bonjour, ",($donnees['pseudo']),
    "<br> Vous etes née le ",($donnees['date']),
    "<br>",
    "Votre e-mail est ",($donnees['email']),
    "<br>",
    "<a href=\"formulaire.php\">Modifier vos données ici :)</a>",
    "<a href=\"accuil.php\">Allez a la page d'accueil ici :)</a>";
}

//Formulaire de connexion :
function affFormuConnex(){ ?>
    <div class="FormConnexion"> 
    <h1>Connexion :</h1>
        <form action="connexion.php" method="post">
        Votre pseudo : <input type="text" name="login" autocomplete="on" placeholder="Votre pseudo."required <?php if(!empty($_POST['pseudo'])){sauvData($_POST['pseudo']);}?>>
        <br><br>
        Votre mot de passe : <input type="password" name="mdp_connex" autocomplete="off" required>
        <br><br>
        <!--enrgistrement et réinitialisation --> 
        <input type="submit" name="connexion" value="Se connecter">
        <br><br>
        <a href=formInscription.php>Si vous ne possèdez pas un compte cliquer ici !</a>
    </div>        
<?php
}
    

//Afficher un formulaire pour le mode JOUR OU NUIT de l'application :
function jour_nuit(){
    ?>
        <div class="FormJN"> 
            Selectionné le mode qui vous convient :
            <br>
                <input type="radio" id="Jour" name="JN" value=0 checked>
                <label for="Jour">Jour</label><br>
                <input type="radio" id="nuit" name="JN" value=1>
                <label for="nuit">Nuit</label><br>
            <br><br>
            <!--enrgistrement et réinitialisation --> 
                <input type="submit" name="Enregistrer" value="Enregistrer">
                <input type="reset"></form>
        </div>        
<?php
} 
//if($_SESSION['admin']===true  || c'est ta publication' ){ afficheSuprimmer();}
?>