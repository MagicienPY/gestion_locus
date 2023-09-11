<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>connexion</title>
  <link rel="stylesheet" href="style1.css">
</head>
<body>
  <div class="wrapper">
    <form action="../../controleur/verif.php" method="post">
      <h2>Authentification</h2>
        <div class="input-field">
        <input name="email" type="text" required>
        <label>Entrez votre email</label>
      </div>
      <div class="input-field">
        <input name="passe" type="password" required>
        <label>Entrez votre mot de passe</label>
      </div>
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember">
          <p>me rappeler </p>
        </label>
        <a href="#">Oups j'ai oublier mon mot de passe !</a>
      </div>
      <button name="btn" type="submit">connexion</button>
      <div class="register">
        <p>Don't have an account? <a href="inscription.html">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>