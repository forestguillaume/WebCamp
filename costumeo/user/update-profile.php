<?php
  session_start();
  $error = "no";
  $dbase = mysqli_connect("localhost", "savari_o", "sazapefo", "Costumeo");
   if (mysqli_connect_errno())
    $error = "Failed to connect to MySQL: " . mysqli_connect_error();
  else
  {
    $sql =  "UPDATE Users 
          	 SET Firstname = '" . $_POST['Firstname'] . "',
                 Lastname = '" . $_POST['Lastname'] . "',
                 Login = '" . $_POST['Login'] . "',
                 Email =  '" .$_POST['Email'] . "',
                 Phone = " . $_POST['tel'] . ",
                 Password = '" . $_POST['Password'] . "',
                 Address = '" . $_POST['Address'] . "',
                 Zip = " . $_POST['Zip'] . ",
                 Birthdate = '" . $_POST['Birthdate'] . "'
             WHERE ID = " . $_SESSION["ID"];
    if (!mysqli_query($dbase, $sql)) 
      $error = "MySQL n'a pas pu effectuer la requête.";
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
        Les informations de votre profil ont bien été modifié.
        <br> Cliquez sur le bouton ci-dessous afin de retourner sur la gestion de votre compte.
        <?php } else { ?>
        <div style="color:red">Un erreur est survenue :</div><br><?php echo $error; ?>
        <?php } ?>
        <br><a href="gestion-de-compte.php"><input class="retour-gestion" type="button" name="Retour" value="Retour sur la gestion de votre compte"/></a>   
      </div>
    <?php include "../footer.php"; ?>
    <?php include "../script.php"; ?>
  </body>
</html>