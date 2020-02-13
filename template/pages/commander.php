<?php

if ($_SESSION) {

    $sql = $pdo->prepare('SELECT * from panier
                    JOIN produit ON panier.idproduit=produit.idproduit 
                    JOIN Client ON panier.idclient=Client.idClient 
                    and panier.idclient=:idclient');

    $idclient = $_SESSION['idclient'];
    insertChamps($sql, $idclient, ':idclient');
    $sql->execute();
    $res = $sql->fetchAll(PDO::FETCH_OBJ);
?>


    <div class="container">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
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

                foreach ($res as $row) {
                    $tot = $row->prix * $row->qte;
                    $total += $tot;
            ?>
                    <tr>

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
                <th colspan='3'>TOTAL</th>
                <th><?= $total ?> €</th>
            </tr>
        </table>
    </div>

    <form action="index.php?page=facture" method="POST">
        <div class="card bg-light  col-md-6 rounded mx-auto d-flex justify-content-around ">
            <div class="card-header ">

                <div class="card-body">
                    <!-- aligner les radio button avec les images -->
                    <div class="d-flex justify-content-around">
                        <div class=" custom-radio custom-control-inline">
                            <input type="radio" id="paiement1" name="paiement" class="custom-control-input" checked>
                            <label class="custom-control-label" for="paiement1"><img src="<?= img ?>visa.png" alt=""></label>
                        </div>

                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="paiement2" name="paiement" class="custom-control-input">
                            <label class="custom-control-label" for="paiement2"><img src="<?= img ?>master.png" alt=""></label>
                        </div>

                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="paiement3" name="paiement" class="custom-control-input">
                            <label class="custom-control-label" for="paiement3"><img src="<?= img ?>paypal.png" alt=""></label>
                        </div>
                    </div>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNom">Nom et Prénom sur la carte</label>
                    <input type="text" name="nom" class="form-control" id="inputNom" required autofocus>
                </div>

                <div class="form-group col-md-6" id="numeroCarte">
                    <label for="inputNum">Numéro de la carte</label>
                    <input type="text" name="numero" class="form-control" id="inputNum" required>
                </div>
                <div class="form-group col-md-6" id="paypal" style="display: none">
                    <label for="inputMail">Votre e-mail</label>
                    <input type="mail" name="e-mail" class="form-control" id="inputMail">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6" id="expiration">
                    <label>Expiration</label>
                    <div style="display: flex">

                        <input type="number" min="01" max="12" step="01" value="01" class="form-control" style="width:20%"><span style="font-size: 1.5rem">/</span>
                        <input type="number" min="2020" max="2050" step="01" value="2020" class="form-control" style="width:40%">
                    </div>
                </div>
                <div class="form-group col-md-6" id="ccv">
                    <label for="inputCvv">CCV</label>
                    <input type="text" name="ccv" class="form-control" id="inputCvv" required style="width:40%">
                </div>


            </div>
            <div class="card-header ">
                <input type="submit" name="commander" class="btn btn-success cardButton col-sm-8" value="VALIDER">
            </div>
        </div>

    </form>
<?php
}
?>

<script>
    let paiement3 = document.querySelector('#paiement3');
    let paiement2 = document.querySelector('#paiement2');
    let paiement1 = document.querySelector('#paiement1');
    let inputMail = document.querySelector('#inputMail');
    let inputCvv = document.querySelector('#inputCvv');
    let inputNum = document.querySelector('#inputNum');

    paiement3.addEventListener('click', () => {
        $('#numeroCarte').hide();
        $('#expiration').hide();
        $('#ccv').hide();
        $('#paypal').show();
        inputMail.required = true;
        inputCvv.required = false;
        inputNum.required = false;
    })
    paiement2.addEventListener('click', () => {
        $('#numeroCarte').show();
        $('#expiration').show();
        $('#ccv').show();
        $('#paypal').hide();
        inputMail.required = false;
        inputCvv.required = true;
        inputNum.required = true;
    })
    paiement1.addEventListener('click', () => {
        $('#numeroCarte').show();
        $('#expiration').show();
        $('#ccv').show();
        $('#paypal').hide();
        inputMail.required = false;
        inputCvv.required = true;
        inputNum.required = true;
    })
</script>