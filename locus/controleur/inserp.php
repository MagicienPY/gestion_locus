<?php
namespace tchopvite;
session_start();
require('../model/log.php');


  function inser(){
   // var_dump($_POST);
    echo $nom = $_POST['nom'];
    echo $prix = $_POST['prix'];

    $statement = $pdo->prepare('INSERT INTO panier(nom,prix,id_cli) VALUES(:nom,:prix)');
    $statement->execute([
            'nom' => $_POST['nom'],
            'prix' => $_POST['prix'],
          ]);
    echo "enregistrement reussit";

    header('location:../api/');
     }

 
    
inser()
?>