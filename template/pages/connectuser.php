<?php


    if (isset($_POST['submitConnect'])) { 
        $mail = $_POST["mail"];
        $pass = $_POST["pass"];
        echo $mail."<br>";
        echo $pass."<br>";
        $sql = $pdo->prepare('SELECT * FROM Client where mail=:mail and motdepasse=:pass');
        insertChamps($sql, $mail, ':mail');
        insertChamps($sql, $pass, ':pass');
        $sql->execute();
        // $sql->execute([":mail" => $mail, ":pass" => $pass]);
      $test = $sql->fetch();
      header('location : index.php?page=connecter');
      echo 'ok';
    
      }
