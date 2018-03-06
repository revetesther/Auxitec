<?php
include "./includes/header.php";

echo "<h1> Ceci est le corp de mon index.PHP </h1>";

if (isset($_GET['page']) && $_GET['page'] != "")
    {
    $page = $_GET['page'];
    }
else
    {
     $page = "acceuil";
    }

// Opérateur ternaire
$page = (isset($_GET['page']) && $_GET['page'] != "") ? $_GET['page'] : "acceuil";

$page = "./includes/" . $page . ".inc.php";

var_dump($page); // affiche la variable : son type et sa valeur

$files = glob("./includes/*.inc.php"); // ramène liste de tous les répertoires inc.php

echo"<pre>"; // concerve la présentation avec les entrée
  print_r ($files); // print_r => comme echo mais bon pour afficher les tableaux
echo"</pre>";

if (in_array($page,$files))
    {
    include $page;
    }
else
    {
        include "./includes/acceuil.inc.php";
    }


include "./includes/footer.php";

