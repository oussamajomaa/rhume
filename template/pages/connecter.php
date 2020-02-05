
<?php

// if (isset($_POST['submitConnect'])) {
//   $mail = $_POST["mail"];
//   $pass = trim(htmlspecialchars($_POST["pass"]));

//   $sql = $pdo->prepare('SELECT * FROM Client where mail=:mail');
//   insertChamps($sql, $mail, ':mail');

//   $sql->execute();
//   $res = $sql->fetch(PDO::FETCH_OBJ);

//   if (!$res) {
//     $_SESSION['err']= 'Utilisateur non trouvé';
//   } else {
//     $motdepasse = $res->motdepasse;
//     $validpasse = password_verify($pass, $motdepasse);
//     if ($validpasse) {
//       $_SESSION['login'] = $res->prenom . ' ' . $res->nom;
//       header("Location:index.php?page=accueil");
//     } else {
//       $_SESSION['err']= 'Mot de Passe Incorrect';
//     }
//   }
// }
?>

<div class="container" style="padding: 5%">
<?php

  if ($_SESSION){
    
    echo '<h4 style="color:red">'.$_SESSION['err'].'</h4>';
  }

?>
  
  <form action="index.php?page=connectuser" method="POST">
    <div class="form-group">
      <label for="exampleInputEmail1">Adresse Mail</label>
      <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" autofocus>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Mot de Passe</label>
      <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password" autocomplete="new-password">
    </div>

    <button type="submit" name="submitConnect" class="btn btn-primary" id="submitConnect">SE CONNECTER</button>
    <button type="reset" class="btn btn-primary">REINITIALISER</button>
  </form>
</div>

<!-- <script src="js/connect.js"></script> -->



