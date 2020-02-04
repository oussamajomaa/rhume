<?php

function insertChamps($sql,$champs,$value){
        $champs=trim(htmlspecialchars($champs));
        $sql->bindParam($value,$champs);
}


