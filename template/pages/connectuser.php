<?php
// session_start();
// include '../../config/config.php';
// include '../../assets/fonction/fonctionSql.php';
// $success = 0;
// $msg = "Une erreur est survenue";
// $data = [];

// if (isset($_POST['submitConnect'])) {

// if ((!empty($_POST['mail']))and(!empty($_POST['pass']))){
//   $mail = $_POST["mail"];
//   $pass = trim(htmlspecialchars($_POST["pass"]));
  
//     $sql = $pdo->prepare('SELECT * FROM Client where mail=:mail');
//     insertChamps($sql, $mail, ':mail');
//     $sql->execute();
//     $res = $sql->fetch(PDO::FETCH_OBJ);
  
//     if (!$res) {
//       $msg= 'Utilisateur non trouvé';
//     } else {
//       $motdepasse = $res->motdepasse;
//       $validpasse = password_verify($pass, $motdepasse);
//       if ($validpasse) {
//         $_SESSION['login'] = $res->prenom . ' ' . $res->nom;
//         $success=1;
//         $msg="";
//       } else {
//           $_SESSION["erreur"] = 'Mot de Passe Incorrect';
//           $msg= 'Mot de Passe Incorrect';
//       }
//     }
// }
// else{
//   $msg = 'Veillez saisir tous les champs';
// }


//   $res = ["success" => $success, "msg" => $msg];
//   echo json_encode($res);

// if ($_SESSION){
//   $_SESSION['err']="";
// }
if (isset($_POST['submitConnect'])) {
  $mail = $_POST["mail"];
  $pass = trim(htmlspecialchars($_POST["pass"]));

  $sql = $pdo->prepare('SELECT * FROM Client where mail=:mail');
  insertChamps($sql, $mail, ':mail');

  $sql->execute();
  $res = $sql->fetch(PDO::FETCH_OBJ);

  if (!$res) {
    $_SESSION['err']= 'Identifiant ou Mot de Passe est Incorrect';
    header('location:index.php?page=connecter');
  } else {
    $motdepasse = $res->motdepasse;
    $validpasse = password_verify($pass, $motdepasse);
    if ($validpasse) {
      $_SESSION['login'] = $res->prenom . ' ' . $res->nom;
      $_SESSION['idclient'] = $res->idClient;
      header("Location:index.php?page=accueil");
    } else {
      $_SESSION['err']= 'Identifiant ou Mot de Passe est Incorrect';
      header('location:index.php?page=connecter');
    }
  }
}


?>