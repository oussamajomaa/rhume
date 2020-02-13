<?php

if ($_SESSION) {
    $id = $_SESSION['idclient'];
    $sql = $pdo->prepare('SELECT * from Client where idClient=:idclient');
    insertChamps($sql, $id, ':idclient');
    $sql->execute();
    $res = $sql->fetch(PDO::FETCH_OBJ);
}


if (isset($_POST['submitChangeMdp'])) {

    if (!empty($_POST['mdp_old'])) {
        if (!empty($_POST['mdp_new']) && (!empty($_POST['mdp_confirm']))) {
            if ($_POST['mdp_new'] == $_POST['mdp_confirm']) {
                $mdp_old = $res->motdepasse;

                $mdp_valide = password_verify($_POST['mdp_old'], $mdp_old);
                if ($mdp_valide) {
                    $sql1 = $pdo->prepare('UPDATE Client SET motdepasse=:motdepasse where idClient=:idclient');
                    insertChamps($sql1, $_SESSION['idclient'], ':idclient');
                    $mdp_crypt = password_hash(($_POST['mdp_new']), PASSWORD_DEFAULT);
                    insertChamps($sql1, $mdp_crypt, ':motdepasse');
                    $sql1->execute();
?>
                    <div class="container col-4">
                        <div class="alert alert-success alert-dismissible fade show col-md-12" role="alert">
                            <strong>Votre mot de passe a bien été changé.</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div class="container col-4">
                        <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
                            <strong>Le mot de passe est incorect.</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <!-- les deux mots de passe saisis ne sont pas identique -->
                <div class="container col-4">
                    <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
                        <strong>Les mots de passe ne sont pas identiques.</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
<?php
            }
        }
    }
}

?>

<div class="container">
    <nav class="nav nav-pills">
        <a class="nav-item nav-link active " href="#container1" data-toggle="tab">Mon profil</a>
        <a class="nav-item nav-link " href="#container2" data-toggle="tab">Modifier mot de Passe</a>
        <a class="nav-item nav-link " href="#container3" data-toggle="tab">Supprimer mon compte</a>
    </nav>

    <div class="dropdown-divider"></div>
    <div class="tab-content">
        <div class="tab-pane active form-group col-md-12" id="container1">
            <!-- form to modify personel info -->
            <form action="" method="POST">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNom1">Nom</label>
                        <input type="text" name="nom" class="form-control" id="inputNom1" required autofocus value="<?= $res->nom ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPrenom1">Prénom</label>
                        <input type="text" name="prenom" class="form-control" id="inputPrenom1" required value="<?= $res->prenom ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputTel1">Téléphone</label>
                        <input type="text" name="tel" class="form-control" id="inputTel1" required value="<?= $res->tel ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail1">Mail</label>
                        <input type="email" name="mail" class="form-control" id="inputEmail1" placeholder="exemple@john.fr" required value="<?= $res->mail ?>" disabled>
                    </div>
                </div>

                <div class="form-group">

                    <label for="inputAddress1">Adresse</label>
                    <input type="text" name="adresse" class="form-control" id="inputAddress1" required value="<?= $res->adresse ?>">

                </div>


                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="inputCity1">Ville</label>
                        <input type="text" name="ville" class="form-control" id="inputCity1" required value="<?= $res->ville ?>">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputPays1">Pays</label>
                        <input type="text" name="pays" class="form-control" id="inputPays1" required value="<?= $res->pays ?>">
                    </div>
                </div>

                <div class="form-group">

                </div>
                <button type="submit" name="fdf" class="btn btn-success">ENREGISTRER</button>
                <!-- <button type="reset" name="resetInsert" class="btn btn-primary" id="reset1">Annuler</button> -->
            </form>
        </div>


        <div class="tab-pane form-group col-md-12" id="container2">
            <!-- form to modify password -->
            <form action="" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputPassword1">Encien Mot de Passe</label>
                        <input type="password" name="mdp_old" class="form-control" id="inputPassword1" autofocus required autocomplete="new-password" value="">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputPassword11">Nouveau Mot de Passe</label>
                        <input type="password" name="mdp_new" class="form-control" id="inputPassword11" required autocomplete="new-password" value="">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="inputPasswordC1">Confirmer le Nouveau Mot de Passe</label>
                        <input type="password" name="mdp_confirm" class="form-control" id="inputPasswordC1" required value="">
                    </div>

                </div>
                <button type="submit" name="submitChangeMdp" class="btn btn-success">ENREGISTRER</button>
            </form>
        </div>

        <div class="tab-pane form-group col-md-12" id="container3">
            <!-- form to delete your account -->
            <form action="" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputPassword2">Mot de Passe</label>
                        <input type="password" name="motdepasse" class="form-control" id="inputPassword2" autofocus required autocomplete="new-password" value="">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputPassword21">Confirmer le Mot de Passe</label>
                        <input type="password" name="motdepasse" class="form-control" id="inputPassword21" required autocomplete="new-password" value="">
                    </div>
                </div>
                <button type="submit" name="submitInsert" class="btn btn-danger">SUPPRIMER</button>

        </div>
    </div>
</div>