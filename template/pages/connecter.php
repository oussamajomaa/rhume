<?php

if (isset($_POST['submitConnect'])) {
  $mail = $_POST["mail"];
  $pass = trim(htmlspecialchars($_POST["pass"]));

  $sql = $pdo->prepare('SELECT * FROM Client where mail=:mail');
  insertChamps($sql, $mail, ':mail');

  $sql->execute();
  // $res = $sql->fetch(PDO::FETCH_ASSOC);
  $res = $sql->fetch(PDO::FETCH_OBJ);

  if (!$res) { ?>
    <script>
      alert("Ce nom d'utilisateur n'existe pas")
    </script>
<?php
  } else {
    $motdepasse = $res->motdepasse;
    $validpasse = password_verify($pass,$motdepasse);
    if ($validpasse) {

      
      $_SESSION['login']=$_POST['mail'];
     header("Location:index.php?page=accueil"); 
    }else{
      ?>
      <script>
        alert ('Mot de Passe Incorrect');
      </script>
      <?php
    }
  }
}
?>

<div class="container" style="padding: 5%">
  <form action="#" method="POST">
    <div class="form-group">
      <label for="exampleInputEmail1">Adresse Mail</label>
      <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Mot de Passe</label>
      <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <!-- <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
    <button type="submit" name="submitConnect" class="btn btn-primary" id="submitConnect">SE CONNECTER</button>
    <button type="reset" class="btn btn-primary">REINITIALISER</button>
  </form>
</div>

