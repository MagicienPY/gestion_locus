<?php


session_start();
session_get_cookie_params();
ob_start();



    require('../model/log.php');
    echo "step 0";

    if(isset($_POST['etb']))
    {
        echo "step 1";
        var_dump($_POST);
        if(!empty($_POST['jour']) && !empty($_POST['heure']) )
        {
            echo "step 2";
            $date = htmlspecialchars($_POST['jour']);
            $heure = htmlspecialchars($_POST['heure']);
            $heure_fin = htmlspecialchars($_POST['heure_fin']);                         
        
            if(true)
            {    
                echo "step3";                       
            $planing = $pdo->prepare("SELECT * FROM planing WHERE date = ? AND heure = ? AND heure_fin = ?");
            $planing->execute(array($date, $heure, $heure_fin));
            
            
            
            $planingexit= $planing->rowcount();                            
            if($planingexit == 1)
            {                       
                
                echo '<br><div class="btn btn-danger center" role="alert">planig déjà existant!</div>';
                                                        
            }                               
            else
            {
                echo "step 4";
               
                $statement = $pdo->prepare('INSERT INTO planing (date, heure, heure_fin) VALUES(:date,:heure, :heure_fin)');
                $statement->execute([
                        'date' => $date,
                        'heure' => $heure,
                        'heure_fin' => $heure_fin
                        
                      ]);


                echo "fin";

                header("Location:../vue/drh/listeplaning.php");
               
            } 

            }
            else
            {
                echo '<br><div class="btn btn-danger center" role="alert">probleme survenue verrifier encore svp !</div>';
            }

        }
        else
        {
            echo '<br><div class="btn btn-danger center" role="alert">Veillez remplir tous les champs</div>';
        }
        
    }


?>
