<?php
function entete($titre,$css){
echo "<!DOCTYPE>","\n";
echo "<html lang=\"fr\">","\n";
echo "<head>","\n";
echo "<meta charset=\"utf-8\">","\n";
echo "<link rel=\"stylesheet\" href=\"$css?1\">","<title>$titre</title>","</head>","\n";
echo "<body>","\n";
}
function basDePage(){
    echo "</body>","\n";
    echo " </html>","\n";
}


?>