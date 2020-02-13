<?php

if (isset($_POST['submitConnect'])) {
  $mail = $_POST["mail"];
  $pass = trim(htmlspecialchars($_POST["pass"]));

  $sql = $pdo->prepare('SELECT * FROM Client where mail=:mail');
  insertChamps($sql, $mail, ':mail');

  $sql->execute();
  $res = $sql->fetch(PDO::FETCH_OBJ);

  if (!$res) { ?>
    <div class="container col-4">
      <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
        <strong>Nom d'utilisateur ou mot de passe incorrect.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
    <?php
  } else {
    $motdepasse = $res->motdepasse;
    $validpasse = password_verify($pass, $motdepasse);
    if ($validpasse) {
      $_SESSION['login'] = $res->prenom . ' ' . $res->nom;
      $_SESSION['idclient'] = $res->idClient;
      header("Location:index.php?page=accueil");
    } else { ?>
      <div class="container col-4">
        <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
          <strong>Nom d'utilisateur ou mot de passe incorrect.</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
<?php
    }
  }
}

?>

<div class="container col-8" style="padding: 5%">
  <form method="POST">
    <div class="form-group">
      <label for="exampleInputEmail1">Adresse Mail</label>
      <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" autofocus>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Mot de Passe</label>
      <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password" autocomplete="new-password">
    </div>

    <button type="submit" name="submitConnect" class="btn btn-primary col-sm-12" id="submitConnect">SE CONNECTER</button>
    <div class="container">

      <a class="nav-item col-6" href="index.php?page=mdp_oublie">Mot de passe oublié?</a>
      <a class="nav-item col-6" href="index.php?page=inscrire">S'inscrire</a>
    </div>

  </form>
</div>

<!-- <script src="js/connect.js"></script> -->