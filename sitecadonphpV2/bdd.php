<?php
try{
    /* (nom du serveur, nom de la base, login, mot de passe )*/
    $bdd = new PDO('mysql:host=localhost;dbname=cadon1;charset=utf8','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

   }
catch (PDOException $e)
    {
        die('erreur : '.$e->getMessage());

    }
?>
