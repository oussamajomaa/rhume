<div class="container" style="padding:5%">

  <!-- <form action="template/template-parts/adduser.php" method="POST"> -->
  <form action="index.php?page=adduser" method="POST">

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputNom">Nom</label>
        <input type="text" name="nom" class="form-control" id="inputNom" required>
      </div>
      <div class="form-group col-md-6">
        <label for="inputPrenom">Prénom</label>
        <input type="text" name="prenom" class="form-control" id="inputPrenom" required>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputTel">Téléphone</label>
        <input type="text" name="tel" class="form-control" id="inputTel" required>
      </div>
      <div class="form-group col-md-6">
        <label for="inputEmail">Mail</label>
        <input type="email" name="mail" class="form-control" id="inputEmail" placeholder="Email" required>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputPassword">Mot de Passe</label>
        <input type="password" name="motdepasse" class="form-control" id="inputPassword" placeholder="Mot de passe" required>
      </div>

      <div class="form-group col-md-6">
        <label for="inputPasswordC">Confirmer le Mot de Passe</label>
        <input type="password" name="confirmMot" class="form-control" id="inputPasswordC" placeholder="Confirmer le Mot de passe" required>
      </div>

    </div>

    <div class="form-group">

      <label for="inputAddress">Adresse</label>
      <input type="text" name="adresse" class="form-control" id="inputAddress" placeholder="N°, rue , avenue ," required>

    </div>


    <div class="form-row">

      <div class="form-group col-md-6">
        <label for="inputCity">Ville</label>
        <input type="text" name="ville" class="form-control" id="inputCity" required>
      </div>
      <!-- <div class="form-group col-md-2">
        <label for="inputCode">Code Postal</label>
        <input type="text" name="codepostal" class="form-control" id="inputCode">
      </div> -->
      <div class="form-group col-md-6">
        <label for="inputPays">Pays</label>
        <input type="text" name="pays" class="form-control" id="inputPays" required>
      </div>
    </div>

    <div class="form-group">

    </div>
    <button type="submit" name="submitInsert" class="btn btn-primary">S'INSCRIRE</button>
    <button type="reset" name="resetInsert" class="btn btn-primary" id="reset">REINITIALISER</button>
  </form>
</div>
<script src="js/inscrire.js"></script>
<!-- ajouter un utilisateur -->

<?php
// if (isset($_POST['submitInsert'])) {
 
//   $pdo = new PDO('mysql:host=localhost;dbname=rhum;charset=utf8', 'step25', 'step25');
//   $mail = $_POST["mail"];
//   $sql = $pdo->prepare('SELECT mail FROM Client where mail=:mail');
//   insertChamps($sql, $mail, ':mail');
//   $sql->execute();
//   $res = $sql->fetch();

//   if ($res) {
//     echo "<script>alert ('ce mail est existe, veillez saisissez un autre mail')</script>";
//     // echo 'ce mail est existe, veillez saisissez un autre mail';
//   } else {
//     $sql = $pdo->prepare('INSERT INTO Client (nom,prenom,adresse,tel,mail,motdepasse,ville,pays) 
//                         VALUES (:nom,:prenom,:adresse,:tel,:mail,:motdepasse,:ville,:pays)');
//     insertChamps($sql, $_POST['nom'], ':nom');
//     insertChamps($sql, $_POST['prenom'], ':prenom');
//     insertChamps($sql, $_POST['adresse'], ':adresse');
//     insertChamps($sql, $_POST['tel'], ':tel');
//     insertChamps($sql, $_POST['mail'], ':mail');
//     $motdepasse = password_hash($_POST['motdepasse'], PASSWORD_BCRYPT);
//     insertChamps($sql, $motdepasse, ':motdepasse');
//     insertChamps($sql, $_POST['ville'], ':ville');
//     // insertChamps($sql, $_POST['codepostal'], ':codepostal');
//     insertChamps($sql, $_POST['pays'], ':pays');
//     $sql->execute();
//   }
// }

?>

