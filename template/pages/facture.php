<div class="container col-4">
        <div class="alert alert-success alert-dismissible fade show col-md-12" role="alert">
          <strong>Votre paiement a été accepté. <br> Vous pouvez imprimer votre facture</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
<?php

if ($_SESSION){
    $id=$_SESSION['idclient'];
    // store date of today in variable
    $datecommande=date("Y-m-d");
    // Add a row to 'commande' table
    
    $sql=$pdo->prepare("INSERT INTO commande (datecommande,idClient) 
                        VALUES ('$datecommande','$id')");
    $sql->execute();
    $idcommande=$pdo->lastInsertId();

    $sql=$pdo->prepare('SELECT * FROM panier JOIN produit ON panier.idproduit=produit.idproduit');
    $sql->execute();
    $res=$sql->fetchAll(PDO::FETCH_OBJ);
    // insert all items in panier into 'commande_produit' tabel
    if ($res){
        foreach($res as $row){
            $sql_ins=$pdo->prepare("INSERT INTO Commande_Produit (idcommande,idproduit,qte,prix)
                                    VALUES ('$idcommande','$row->idproduit','$row->qte','$row->prix')");
            $sql_ins->execute();
        }
        $sql=$pdo->prepare('DELETE FROM panier');
        $sql->execute();
    }   
}

$sql = $pdo->prepare("SELECT * FROM Commande_Produit 
                    JOIN commande ON Commande_Produit.idcommande=commande.idcommande 
                    JOIN Client ON commande.idClient=Client.idClient 
                    JOIN produit ON Commande_Produit.idproduit=produit.idproduit 
                    and Commande_Produit.idcommande=:idcommande");
insertChamps($sql,$idcommande,':idcommande');
$sql->execute();
$res = $sql->fetchAll(PDO::FETCH_OBJ);

if ($res) {
?>
<style>
    .table-facture{
        width: 100%;
    }
    .table-facture td:nth-child(2){
       text-align: center;
    }
    .table-facture td:nth-child(1){
       padding-left: 2rem;
    }
</style>
    <div class="container">
        <table class="table-facture">
            <tr><td><img src="<?= img ?>logofacture.png" alt=""></td><td></td></tr>
            <tr><td>2 AVENUE DE MARECHAL</td><td></td></tr>
            <tr><td>66550 BOGOTA - COLOMBIE</td><td></td></tr>
            <tr><td>www.rumasug.com</td><td></td></tr>
            <tr><td></td><td><?= $res['0']->nom . ' ' . $res['0']->prenom; ?></td></tr>
            <tr><td></td><td><?= $res['0']->adresse ?></td></tr>
            <tr><td></td><td><?= $res['0']->ville . ' - ' . $res['0']->pays ?></td></tr>
            <tr><td><?= "Facture N°:" . $res['0']->idcommande . ' Date: ' . $res['0']->datecommande ?></td><td></td></tr>

        </table>
            
            


            

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
            if ($res) {
                $tot = 0;
                $total = 0;
                $i = 0;
                foreach ($res as $row) {
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
            }
            ?>
            <tr>
                <th colspan='4' style="text-align: right">TOTAL</th>
                <th><?= $total ?> €</th>
            </tr>
        </table>
        <button class="btn btn-success my-2 my-sm-0" type="submit" name="submitChercher">Imprimer</button>
    </div>
<?php

}

?>