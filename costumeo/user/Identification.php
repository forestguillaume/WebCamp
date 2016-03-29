<?php
  $path = "../";
  if ($_COOKIE["wrong"] == 1)
    $wrong = 1;
  setcookie("wrong", null, -1);
?>
<!DOCTYPE html>
<html lang="en">
  <?php include "../head.php"; ?>
  <body>
    <?php include "../header.php"; ?>
    <div>
    <form action="connected.php" class="white-purple" method="post" height="inherit">
      <h1>Connexion<span>Veuillez remplir tous les champs.</span></h1>
      <?php if ($wrong == 1) { ?>
      <label><span></span><div id="wrong">Les informations entrées ne sont pas correctes.</div></label>
      <label><span></span><div id="wrong">Réessayez</div></label>
      <?php } ?>
      <label><span>Identifiant</span><input type="text" placeholder= "Identifiant" name="login" required/></label>
      <label><span>Mot de passe</span><input type="password" placeholder= "********" name="pwd" required/></label>
      <hr>
      <label><span>&nbsp;</span><input type="submit" class="button" value="Se connecter"></label>
    </form></div>
    <div style="height: 50%; width: 50%;"></div>
      <?php include "../footer.php"; ?>
      <?php include "../script.php"; ?>
    </div>
  </body>
</html>