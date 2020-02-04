<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
</style>

<body>
    <div class="wall">

    </div>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Rhuma Sug</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link active" href="index.php?page=accueil">ACCUEIL <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=qui_sommes">QUI SOMMES-NOUS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">PANIER</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="inscrire.php">S'INSCRIRE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="connecter.php">SE CONNECTER</a>
                </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        MON COMPTE
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php

                        if(!empty($_SESSION["login"])){
                            ?>
                            <a class="dropdown-item" href="index.php?page=gererCompte">Gerer mon compte</a>

                            <?php

                           

                        }else{
                            ?>
                            <a class="dropdown-item" href="index.php?page=connecter">SE CONNECTER</a>
                            <?php
                        }
                        ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?page=inscrire">S'INSCRIRE</a>
                        <!-- <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a> -->
                    </div>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li> -->
            </ul>
            <?php
            if (!empty($_SESSION['login'])) {
                echo "<h3>Bienvenue </h3>" . $_SESSION['login'];
            }
            ?>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Chercher" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submitChercher">Chercher</button>
            </form>
        </div>
    </nav>