<?php

if (isset($_POST['submitMdp'])) { 
  $mail = $_POST["mail"];
  $sql = $pdo->prepare('SELECT mail FROM Client where mail=:mail');
  insertChamps($sql, $mail, ':mail');
  $sql->execute();
  $res = $sql->fetch();
  if (!$res){
      echo "cet utilisateur n'existe pas";
      
      
  }
  else{
     echo "success<br>"; 
     $new_mdp=rand(100,99999);

        echo $new_mdp;;

  }
}
?>

<div class="container col-8" style="padding: 5%">
  <form method="POST">
    <div class="form-group">
      <label for="input_mail_mpd">Adresse Mail</label>
      <input type="email" name="mail" class="form-control" id="input_mail_mpd" aria-describedby="emailHelp" placeholder="Enter email" autofocus>
    </div>
    
    <button type="submit" name="submitMdp" class="btn btn-primary col-sm-12" id="submitConnect">Chercher</button>
    

  </form>
</div>