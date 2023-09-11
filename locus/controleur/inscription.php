<?php
session_start();
     ob_start(); 


    require('../model/log.php');
    echo "step 0";

    if(isset($_POST['btn']))
    {
        echo "step 1";
        var_dump($_POST);
        if(!empty($_POST['nom']) && !empty($_POST['email']) )
        {
            echo "step 2";
            $nom= htmlspecialchars($_POST['nom']);
            $email= htmlspecialchars($_POST['email']);
            $prenom= htmlspecialchars($_POST['prenom']);
            $tel= htmlspecialchars($_POST['tel']);
            $matriculeA= htmlspecialchars($_POST['matriculeA']);
            $userpwd= sha1($_POST['passe']); 
            $pwd2= sha1($_POST['passe2']);                            
        
            if($pwd2 == $userpwd)
            {    
                echo "step3";                       
            $user = $pdo->prepare("SELECT * FROM famille WHERE email = ?  AND tel = ? ");
            $user->execute(array($email, $tel));
        echo " 4444";
            $userexit= $user->rowcount();

            echo "blabla" ;
            if($userexit == 1)
            {                       
                
                echo '<br><div class="btn btn-danger center" role="alert">Utilisateur déjà existant!</div>';
                                                        
            }                               
            else
            {
                echo "step 4";
                $hashing = password_hash($pwd2, PASSWORD_BCRYPT);
                echo "yo";
               // $userinsert= $pdo->prepare("INSERT INTO client (nomclient, email, tel, localisation, mot_de_passe, adresse, img) VALUES (?, ?, ?, ?, ?, ?, ?)");
                //$userinsert->execute(array($nom, $email, $tel, $locali, $pwd2, $locali, $img));

                $statement = $pdo->prepare('INSERT INTO famille (nom, prenom, matriculeA, tel, email, passe) VALUES(:nom,:prenom, :matriculeA, :tel, :email, :passe)');
                $statement2 = $pdo->prepare('INSERT INTO utilisateur ( email, passe,tel) VALUES( :email, :passe ,:tel)');
                $statement->execute([
                        'nom' => $nom,
                        'prenom' => $prenom,
                        'matriculeA' => $matriculeA,
                        'tel' => $tel,
                        'email' => $email,
                        'passe' => $hashing
                        
                        
                      ]);

                      $statement2->execute([
                        'email' => $email,
                        'passe' => $hashing,
                        'tel' => $tel,
                        
                        
                      ]);

                echo "fin";
                header("Location: ../vue/famille/");
            
            } 

            }
            else
            {
                echo '<br><div class="btn btn-danger center" role="alert">Les mots de passe ne sont pas conforme</div>';
            }

        }
        else
        {
            echo '<br><div class="btn btn-danger center" role="alert">Veillez remplir tous les champs</div>';
        }
        
    }


?>
