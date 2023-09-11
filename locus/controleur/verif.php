<?php
namespace famille;
ob_start();

require('../model/log.php');

var_dump($_POST);
if(isset($_POST['btn']))
{
    echo "step 1";
    if(!empty($_POST['email']) && !empty($_POST['passe']))
    {
            echo "step 2";
            $email= htmlspecialchars($_POST['email']);
            $passe= htmlspecialchars($_POST['passe']);
            $userpwd= password_hash($passe, PASSWORD_BCRYPT); 
                                  
         
                        
            $user= $pdo->prepare("SELECT * FROM utilisateur WHERE email = ?");
            $user->execute(array($email));
            echo "commande executé";   
            $userexit= $user->rowcount();
                
                echo"    .",$userexit;
                $ligne = $user->fetch();
                $verification = password_verify($passe,$ligne['passe']);
             //  if(empty($user->fetch())){ 
                if($userexit )
                {   
                    echo "step 3";
                    
                    $_SESSION['idE'] = $ligne['idu'];
                    $_SESSION['nom'] = $ligne['email'];
                  
        
                    header("Location:../vue/famille/main.php?id=" .$_SESSION['idE']);  
                    ob_end_flush();                                             
                    } else{
                        header("Location:../vue/famille/");  
                    } 
                // }
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