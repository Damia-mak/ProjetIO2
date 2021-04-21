<?php
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
function erreur($message_erreur){
    echo $message_erreur;
}

?>