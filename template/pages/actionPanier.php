<?php

if ((!empty($_GET['idc'])) && (!empty($_GET['idp']))) {
    if (isset($_POST['supprimer'])) {
        $idclient = $_GET['idc'];
        $idproduit = $_GET['idp'];
        $sql = $pdo->prepare('DELETE from panier where idclient=:idclient and idproduit=:idproduit');
        insertChamps($sql, $idclient, ':idclient');
        insertChamps($sql, $idproduit, ':idproduit');
        $sql->execute();
    }
    if (isset($_POST['modifier'])) {
        $idclient = $_GET['idc'];
        $idproduit = $_GET['idp'];
        $qte = $_POST['qnte'];
        $sql = $pdo->prepare('UPDATE panier SET qte=:qte where idclient=:idclient and idproduit=:idproduit');
        insertChamps($sql, $qte, ':qte');
        insertChamps($sql, $idclient, ':idclient');
        insertChamps($sql, $idproduit, ':idproduit');
        $sql->execute();
    }
}
header('location: index.php?page=panier');
