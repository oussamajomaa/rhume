<?php

if ($_SESSION){
    if (isset($_POST['ajoutPanierSubmit'])) {
    
        if (($_POST['qte'])>0){
            $idclient=$_SESSION['idclient'];
            $idproduit=$_GET['idproduit'];
            $qte=$_POST['qte'];
            $sql=$pdo->prepare('INSERT INTO panier (idclient,idproduit,qte)
                                VALUES (:idclient,:idproduit,:qte)');
            insertChamps($sql, $idclient, ':idclient');
            insertChamps($sql, $idproduit, ':idproduit');
            insertChamps($sql, $qte, ':qte');
            $sql->execute();
            $_SESSION['err1']='Le produit a été ajouté au panier';
        }
        else{
            $_SESSION['err1']='La quantité doit être supérieur à 0';
        }
    }
}
else{
    echo 'Connectez-vous...';
}


if ($_SESSION){

$sql = $pdo->prepare('SELECT designation, prix, photo,qte from panier,produit,Client 
                    where panier.idproduit=produit.idproduit and panier.idclient=Client.idClient
                    and panier.idclient=:idclient');

$idclient=$_SESSION['idclient'];
insertChamps($sql, $idclient, ':idclient');
$sql->execute();
$res = $sql->fetchAll(PDO::FETCH_ASSOC);

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
$i=0;
while ($i<count($res)) {

    ?>
    <tr>
        <td><img src="<?= $res[$i]["photo"] ?>" width="40%" ></td>
        <td><?= $res[$i]["designation"] ?></td>
        <td><?= $res[$i]["prix"] ?> €</td>
        <td><?= $res[$i]["qte"]?></td>
    </tr>
<?php
$i++;
}
?>
</table>
</div>
<?php
}
?>