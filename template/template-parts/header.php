<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Rhuma Sug</title>


</head>
<style>
    .wall {
        height: 20vh;
        background-image: url('<?= img; ?>wall.jpeg');
    }

    .card {
        margin: 1%;
    }

    .cardButton {
        display: block;
        margin: auto;
        white-space: pre-wrap;
    }

    .card-title {
        text-align: center;
    }

    #panier:hover {
        content: 'Panier';
    }
</style>

<body>

    <div class="wall">

    </div>
    <?php
    if (!empty($_SESSION['login'])) {
        echo "<h5 style='color: black; font-weight:bold'>Bienvenue  " . $_SESSION['login'] . "</h5>";
    }
    ?>

    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><img src="<?= img ?>logo1.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link " href="index.php?page=accueil">ACCUEIL <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=qui_sommes">QUI SOMMES-NOUS</a>
                </li>
                <?php

                if (empty($_SESSION["login"])) {
                ?>
                    <li class="nav-item ">
                        <a class="nav-link " href="index.php?page=connecter">CONNEXION <span class="sr-only">(current)</span></a>
                    </li>

                <?php
                } else {
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            MON COMPTE
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="index.php?page=profil">Info Personnelles</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php?page=mescommandes">Mes Commandes</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php?page=deconnecter">Déconnexion</a>
                        </div>
                    </li>

                    <div></div>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=panier" title="Panier">PANIER <img src="<?= img ?>panier.png"></a>
                    </li>
                <?php
                }
                ?>

                </li>
            </ul>
        </div>
        <form class="form-inline my-2 my-lg-0" action="index.php?page=chercher" method="POST">
            <input class="form-control mr-sm-2" type="search" placeholder="Chercher" aria-label="Search" name="chercher">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submitChercher">Chercher</button>
        </form>

        </div>

    </nav>

    <div class="dropdown-divider"></div>