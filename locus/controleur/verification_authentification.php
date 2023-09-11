<?php
namespace tchopvite;
session_start();
require('../model/log.php');


if(isset($_POST['btn']))
{
    echo "step 1";
    if(!empty($_POST['Email']) && !empty($_POST['pwd']))
    {
            echo "step 2";
            $email= htmlspecialchars($_POST['Email']);
            $userpwd= sha1($_POST['pwd']);                          
         
                        
            $user= $pdo->prepare("SELECT * FROM client WHERE email = ? AND mot_de_passe = ? ");
            $user->execute(array($email, $userpwd));
            echo "commande executé";   
            $userexit= $user->rowcount();
                            
                if($userexit == 1)
                {   
                    echo "step 3";
                    $userinfo = $user->fetch();
                    $_SESSION['idEnt'] = $userinfo['id_client'];
                    $_SESSION['id_client'] = $userinfo['id_client'];
                    $_SESSION['nomclient'] = $userinfo['nomclient'];
                    $_SESSION['email'] = $userinfo['email'];
                    $_SESSION['local_client'] = $userinfo['localisation'];
                    $_SESSION['adresse'] = $userinfo['adresse'];
        
                    header("Location:../vue/client/panier.php?id_client=" .$_SESSION['id_client']);  
                    ob_end_flush();                                             
                    }                               
                    else
                    {
                        echo '<br><div class="btn btn-danger center" role="alert">Utilisateur inconnu!</div>';
                    } 
    }
    else
    {
        echo '<br><div class="btn btn-danger center" role="alert">Veillez remplir tous les champs</div>';
    }


}


// en resumé on verifi si les mots de passe sont identique avant de sauvegarder
$password1 = 0;
if(($password1 != 1)){ 
    inser();
}
?>