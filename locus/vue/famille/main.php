<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Glassmorphism Website | CodingLab </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
     <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
      integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
      crossorigin=""
    />
   </head>
<body>
  <?php
  
  ob_start();

 $a= $_SESSION['idE'];
  require('../../model/log.php');
  $user= $pdo->prepare("SELECT * FROM utilisateur ");
  $user->execute();
  $ligne = $user->fetch();
if($ligne = $user->fetch()){
  if ($_SESSION['idE'] == $ligne["idu"]){
  }
  echo "cool";
  echo $ligne["idu"];
  echo $_SESSION['idE'];

  }else{
    echo "pas cool";
    echo $ligne["idu"];
    echo $_SESSION['idE'];
    session_destroy();
    header("Location:./");
  }
  ?>
  <header>
    <nav class="navbar">
   
      <div class="logo"><a href="#">LOCUS SEC></a> <?php echo $ligne['email'];?></div>
      <ul class="menu">
        <li><a href="main.php">Actualiser</a></li>
        <li><a href="#">Consulter</a></li>
        
        <li><a href="#">Contact</a></li>
        <li><a href="decon.php">deconnexion</a></li>
      </ul>
      <div class="buttons">
        <input type="button" value="Siggnaler">
        <a href="tel:+23769156975">
          
        <ion-icon name="call"></ion-icon></a>
      </div>
    </nav>
    <div class="wrapper">
     
     <div id="map"></div>
    
       
         
     </div>
   </div>
   <script
     type="module"
     src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
   ></script>
   <script
     nomodule
     src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
   ></script>
   <script
     src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
     integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
     crossorigin=""
   ></script>
   <script src="./app.js"></script>
    <div class="play-button">
      
    </div>
  </header>

</body>
</html>
