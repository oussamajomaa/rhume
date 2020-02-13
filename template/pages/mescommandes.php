<?php

$sql = $pdo->prepare("SELECT Commande_Produit.idcommande, datecommande,sum(Commande_Produit.prix) as montant
                    FROM Commande_Produit 
                    JOIN commande ON Commande_Produit.idcommande=commande.idcommande 
                    JOIN Client ON commande.idClient=Client.idClient 
                    JOIN produit ON Commande_Produit.idproduit=produit.idproduit 
                    GROUP by Commande_Produit.idcommande ");
$sql->execute();
$res = $sql->fetchAll(PDO::FETCH_OBJ);
if ($res) {
?>
    <div class="container col-6">

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">N° de Commande</th>
                    <th scope="col">Date de Commande</th>
                    <th scope="col">Montant</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <?php

            foreach ($res as $row) {
            ?>
                <tr>
                    <td><?= $row->idcommande ?></td>
                    <td><?= $row->datecommande ?></td>
                    <td><?= $row->montant ?> €</td>
                    <td>
                        <a href="index.php?page=mescommandes&id=<?= $row->idcommande ?>" class="btn btn-success">AFFICHER</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <?php
        if (isset($_GET['id'])) {
            $sql1 = $pdo->prepare("SELECT * FROM Commande_Produit
            JOIN commande ON Commande_Produit.idcommande=commande.idcommande
            JOIN Client ON commande.idClient=Client.idClient
            JOIN produit ON Commande_Produit.idproduit=produit.idproduit
            and Commande_Produit.idcommande=:idcommande");
            insertChamps($sql1, $_GET['id'], ':idcommande');
            $sql1->execute();
            $res1 = $sql1->fetchAll(PDO::FETCH_OBJ);
            if ($res1) {
        ?>
    </div>
    <div class="container">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">N</th>
                            <th scope="col">DESCRIPTION</th>
                            <th scope="col">PRIX UNITAIRE</th>
                            <th scope="col">QUANTITE</th>
                            <th scope="col">MONTANT</th>
                        </tr>
                    </thead>
                    <?php

                    $tot = 0;
                    $total = 0;
                    $i = 0;
                    foreach ($res1 as $row) {
                        $tot = $row->prix * $row->qte;
                        $total += $tot;
                        $i++;
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $row->designation ?></td>
                            <td><?= $row->prix ?> €</td>
                            <td><?= $row->qte ?> </td>
                            <td><?= $tot ?> €</td>
                        </tr>

                    <?php
                    }
                    ?>
                    <tr>
                        <th colspan='4' style="text-align: right">TOTAL</th>
                        <th><?= $total ?> €</th>
                    </tr>
                </table>
        <?php
            }
        }
        ?>
    </div>
<?php
}
?>