<?php

if ((isset($_POST['submitChercher']))&& (!empty($_POST['chercher']))){
    $designation = $_POST['chercher'] . "%";
    $sql = $pdo->prepare('SELECT * FROM produit where designation like :designation');
    insertChamps($sql, $designation, ':designation');

    $sql->execute();
    $res = $sql->fetchAll(PDO::FETCH_OBJ);
    ?>
    <div class="container">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Photo</th>
                    <th scope="col">Désignation</th>
                    <th scope="col">Prix Unitaire</th>
                </tr>
            </thead>
            <?php
            foreach ($res as $row) {
            ?>
                <tr>
    
                    <td id="photo"><img src="<?= $row->photo ?>" width="90%"></td>
                    <td><?= $row->designation ?></td>
                    <td><?= $row->prix ?> €</td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <?php
}

?>
