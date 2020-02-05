<?php
if (isset($_POST['submitInsert'])) { 
  $mail = $_POST["mail"];
  $sql = $pdo->prepare('SELECT mail FROM Client where mail=:mail');
  insertChamps($sql, $mail, ':mail');
  $sql->execute();
  $res = $sql->fetch();
  if ($res) {

    echo "<script>alert('ce mail est existe, veillez saisissez un autre mail')</script>";
  } else {
    $sql = $pdo->prepare('INSERT INTO Client (nom,prenom,adresse,tel,mail,motdepasse,ville,pays) 
                        VALUES (:nom,:prenom,:adresse,:tel,:mail,:motdepasse,:ville,:pays)');
    insertChamps($sql, $_POST['nom'], ':nom');
    insertChamps($sql, $_POST['prenom'], ':prenom');
    insertChamps($sql, $_POST['adresse'], ':adresse');
    insertChamps($sql, $_POST['tel'], ':tel');
    insertChamps($sql, $_POST['mail'], ':mail');
    $motdepasse = password_hash($_POST['motdepasse'], PASSWORD_BCRYPT);
    insertChamps($sql, $motdepasse, ':motdepasse');
    insertChamps($sql, $_POST['ville'], ':ville');
    // insertChamps($sql, $_POST['codepostal'], ':codepostal');
    insertChamps($sql, $_POST['pays'], ':pays');
    $sql->execute();
  }
}
header('location: index.php?page=inscrire');

?>