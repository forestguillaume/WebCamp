<?php
  $error = "no";
  if ($_POST["mdp"] != $_POST["confirmation"])
  {
    setcookie("confirm", 1);
    header("Location: Inscription.php");
  }

  $dbase = mysqli_connect("localhost", "savari_o", "sazapefo", "Costumeo");
  if (mysqli_connect_errno())
    $error = "Failed to connect to MySQL: " . mysqli_connect_error();
  else
  {
    $sql = "SELECT * FROM Users WHERE Login = '" . $_POST["login"] . "'";
    if (mysqli_num_rows(mysqli_query($dbase, $sql)) > 0)
    {
      setcookie("exists", 1);
      header("Location: Inscription.php");
    }
    $sql = 'INSERT INTO Users (Firstname, Lastname, Login, Email, Phone, Password, Address, Zip, Birthdate, Creation_date, Role)
            VALUES ("' . $_POST["firstName"] .
            '", "' . $_POST["name"] .
            '", "' . $_POST["login"] .
            '", "' . $_POST["email"] .
            '", "' . $_POST["tel"] .
            '", "' . $_POST["mdp"] .
            '", "' . $_POST["address"] .
            '", "' . $_POST["postal"] .
            '", "' . $_POST["date"] .
            '", NOW()
            , ' . $_POST["status"] . ');';
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
          Votre compte a été créé avec succès !<br><br><br>
        <?php } else { ?>
          <div style="color:red">Un erreur est survenue :</div><br><?php echo $error; ?>
        <?php } ?>
      </div>
    <?php include "../footer.php"; ?>
    <?php include "../script.php"; ?>
  </body>
</html>