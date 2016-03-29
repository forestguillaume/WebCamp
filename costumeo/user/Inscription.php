<?php
  $path = "../";
  if ($_COOKIE["confirm"] == 1)
    $confirm = 1;
  if ($_COOKIE["exists"] == 1)
    $exists = 1;
  setcookie("confirm", null, -1);
  setcookie("exists", null, -1);
?>
<!DOCTYPE html>
<html lang="en">
  <?php include "../head.php"; ?>
  <body>
    <?php include "../header.php"; ?>
    <form action="submit.php" method="post" class="white-purple">
      <h1>Inscription<span>Veuillez remplir tous les champs.</span></h1>
      <label><span>Nom</span><input type="text" name="name" placeholder="Ex: Un" pattern='[^<>"]+' required /></label>
      <label><span>Prénom</span><input type="text" name="firstName" placeholder="Ex: Deux" pattern='[^<>"]+' required /></label>
      <?php if ($exists == 1) echo "<label><span></span><div style='color: red;'>Cet identifiant existe déjà.</div></label>"; ?>
      <label><span>Identifiant</span><input type="text" name="login" placeholder="Ex: Le_premier" pattern='[^<>"]+' required /></label>
      <?php if ($confirm == 1) echo "<label><span></span><div style='color: red;'>Les mots de passe me correspondent pas.</div></label>"; ?>
      <label><span>Mot de Passe</span><input type="password" name="mdp" placeholder="********" pattern='[^<>"]+' required /></label>
      <label><span>Retapez mot de passe</span><input type="password" name="confirmation" placeholder="********" pattern='[^<>"]+' required /></label>
      <label><span>E-mail</span><input type="email" name="email" placeholder="Ex: Un_1@un.net" pattern='[^<>"]+@[^<>"]+\.[^<>"]+' required /></label>
      <label><span>Téléphone</span><input pattern="\d{10}" type="text" name="tel" placeholder="Ex: 0611111111" required></label>
      <label><span>Adresse</span><textarea type="text" name="address" placeholder="Ex: 1 rue du Un, Un-ville" pattern='[^<>"]+' required></textarea></label>
      <label><span>Code postal</span><input type="text" name="postal" placeholder="Ex: 01001" pattern="\d{5}" required /></label>
      <label><span>Date de naissance</span><input type="date" name="date" required /></label>
      <span id="button"><span>Vous êtes :</span>
        <input type="radio" name="status" value="3" id="company"><label class="opt" for="company"> Une entreprise</label><br>
        <span></span><input type="radio" name="status" value="4" id="private" checked><label class="opt" for="private"> Un particulier</label><br>
      </span>
      <hr>
      <label><span>&nbsp;</span><input type="submit" class="button" value="S'inscrire" /></label>
    </form>
    <?php include "../footer.php"; ?>
    <?php include "../script.php"; ?>
  </body>
</html>