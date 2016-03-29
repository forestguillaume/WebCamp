<?php $path = "../"; ?>
<!DOCTYPE html>
<html lang="en">
  <?php include "../head.php"; ?>
  <body>
    <?php include "../header.php"; ?>
    <form action="" method="post" class="white-purple">
      <h1>Contact<span>Veuillez remplir tous les champs.</span></h1>
      <label><span>Identifiant</span><input id="name" type="text" name="identifiant" placeholder="Identifiant" required/></label>
      <label><span>E-mail</span><input id="email" type="email" name="email" placeholder="Adresse e-mail" required/></label>
      <label><span>Message</span><textarea id="message" name="message" placeholder="Entrez votre message ici ..." required></textarea></label>
      <label><span>&nbsp;</span> <input type="submit" class="button" value="Envoyer" /></label>
    </form>
    <div style="height: 50%; width: 50%;"></div>
    <?php include "../footer.php"; ?>
    <?php include "../script.php"; ?>
  </body>
</html>