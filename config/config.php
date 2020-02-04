<?php

    define('img','assets/img/');
    define ('url','template/pages/');
    define ('file',['accueil'=>'accueil.php','qui_sommes'=>'qui_sommes.php','panier'=>'panier.php',
            'inscrire'=>'inscrire.php','connecter'=>'connecter.php','adduser'=>'adduser.php']);

    $pdo = new PDO('mysql:host=localhost;dbname=rhum;charset=utf8', 'step25', 'step25');
   
?>