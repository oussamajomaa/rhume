<?php

define('img', 'assets/img/');
define('url', 'template/pages/');
define('file',  [
                'accueil' => 'accueil.php',
                'qui_sommes' => 'qui_sommes.php',
                'panier' => 'panier.php',
                'inscrire' => 'inscrire.php',
                'connecter' => 'connecter.php',
                'adduser' => 'adduser.php',
                'deconnecter' => 'deconnecter.php',
                'connectuser' => 'connectuser.php',
                'panier' => 'panier.php',
                'profil' => 'profil.php',
                'actionPanier' => 'actionPanier.php',
                'chercher' => 'chercher.php',
                'mdp_oublie'=>'mdp_oublie.php',
                'commander'=>'commander.php',
                'facture'=>'facture.php',
                'mescommandes'=>'mescommandes.php'
                ]);

$pdo = new PDO('mysql:host=localhost;dbname=rhum;charset=utf8', 'step25', 'step25');

function insertChamps($sql, $champs, $value)
{
    $champs = trim(htmlspecialchars($champs));
    $sql->bindParam($value, $champs);
}
?>