<?php
  session_start();
  $error = "no";
  $dbase = mysqli_connect("localhost", "savari_o", "sazapefo", "Costumeo");
   if (mysqli_connect_errno())
    $error = "Failed to connect to MySQL: " . mysqli_connect_error();
  else
  {
    $sql = 'UPDATE Offers
            SET  Description = "' . $_POST['description'] . '",
                 Quantity = ' . $_POST['quantity'] . ',
                 Price =  ' .$_POST['prix'] . ',
                 Category = "' . $_POST['cat'] . '",
                 Sex = "' . $_POST['sexe'] . '",
                 Quality = "' . $_POST['quality'] . '",
                 Display = 1
                 WHERE ID = ' . $_GET['id'];
    if (!mysqli_query($dbase, $sql))
      $error = "MySQL n'a pas pu effectuer la requête.";
    echo $sql;
  }
  $path = "../";
?>
<!DOCTYPE html>
<html lang="en">
  <?php include "../head.php"; ?>
  <body>
    <?php include "../header.php"; ?>
      <div id="liste">
        <?php if ($error == "no") { ?>
        Les informations de votre annonce ont bien été modifié.
        <br> Cliquez sur le bouton ci-dessous afin de retourner sur la gestion de votre compte et de vos annonces.
        <?php } else { ?>
        <div style="color:red">Un erreur est survenue :</div><br><?php echo $error; ?>
        <?php } ?>
        <br><a href="../user/gestion-de-compte.php"><input class="retour-gestion" type="button" name="Retour" value="Retour sur la gestion de votre compte"/></a>   
      </div>
    <?php include "../footer.php"; ?>
    <?php include "../script.php"; ?>
  </body>
</html>