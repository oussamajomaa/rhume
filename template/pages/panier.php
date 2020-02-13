<?php

if ($_SESSION) {
    if (isset($_POST['ajoutPanierSubmit'])) {

        $idclient = $_SESSION['idclient'];
        $idproduit = $_GET['idproduit'];
        $qte = $_POST['qte'];
        $sql = $pdo->prepare('SELECT * FROM panier where idclient=:idclient and idproduit=:idproduit');
        insertChamps($sql, $idclient, ':idclient');
        insertChamps($sql, $idproduit, ':idproduit');
        $sql->execute();

        $res = $sql->fetch(PDO::FETCH_OBJ);
        if ($res) {
            $qte = $_POST['qte'] + $res->qte;
            $sql = $pdo->prepare('UPDATE panier SET qte=:qte where idclient=:idclient and idproduit=:idproduit');
            insertChamps($sql, $qte, ':qte');
            insertChamps($sql, $idclient, ':idclient');
            insertChamps($sql, $idproduit, ':idproduit');
            $sql->execute();
        } else {
            $idclient = $_SESSION['idclient'];
            $idproduit = $_GET['idproduit'];
            $qte = $_POST['qte'];
            $sql = $pdo->prepare('INSERT INTO panier (idclient,idproduit,qte)
                                    VALUES (:idclient,:idproduit,:qte)');
            insertChamps($sql, $idclient, ':idclient');
            insertChamps($sql, $idproduit, ':idproduit');
            insertChamps($sql, $qte, ':qte');
            $sql->execute();
        }
    }
} else {
    header('location:index.php?page=accueil');
}

$sql = $pdo->prepare('SELECT panier.idclient,panier.idproduit,designation, prix, photo,qte from panier
                    JOIN produit ON panier.idproduit=produit.idproduit 
                    JOIN Client ON panier.idclient=Client.idClient 
                    and panier.idclient=:idclient');

$idclient = $_SESSION['idclient'];
insertChamps($sql, $idclient, ':idclient');
$sql->execute();
$res = $sql->fetchAll(PDO::FETCH_OBJ);

?>
<style>
    #qte {
        width: 30%;
    }

    #photo {
        width: 10%;
    }

    td,
    th {
        text-align: center;
    }
</style>
<?php
if ($res) {
?>

    <div class="container">

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Photo</th>
                    <th scope="col">Désignation</th>
                    <th scope="col">Prix Unitaire</th>
                    <th scope="col">Quantité</th>

                </tr>
            </thead>
            <?php

            foreach ($res as $row) {
            ?>
                <tr>
                    <form action="index.php?page=actionPanier&idc=<?= $row->idclient ?>&idp=<?= $row->idproduit ?>" method="POST">
                        <td id="photo"><img src="<?= $row->photo ?>" width="100%"></td>
                        <td><?= $row->designation ?></td>
                        <td><?= $row->prix ?> €</td>
                        <td>
                            <button class="btn btn-danger btn-circle btn-sm" type="submit" name="supprimer"><img src="<?= img ?>trash.png" alt=""></button>
                            <input style="text-align: center" type="number" name="qnte" id="qte" min=1 value="<?= $row->qte ?>">
                            <button type="submit" name="modifier" class="btn btn-success btn-circle btn-sm"><img src="<?= img ?>add.png" alt=""></button>

                        </td>


                    </form>
                </tr>
            <?php
            }
            ?>

        </table>

        <form action="index.php?page=commander" method="POST">
            <input type="submit" name="commander" class="btn btn-success cardButton col-sm-8" value="PASSER LA COMMANDE">
        </form>
        <div class="dropdown-divider"></div>

    </div>
<?php
} else {
?>
    <div class="container col-4">
        <div class="alert alert-success alert-dismissible fade show col-md-12" role="alert">
            <strong>Votre panier est vide. <br> Allez sur la page d'accueil pour ajouter des article.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php
}
?>