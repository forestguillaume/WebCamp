<?php
  session_start();
  $error = "no";
  $ext = strrchr($_FILES["image"]["name"], ".");

  if (in_array($ext, array(".png", ".jpg", ".jpeg")))
  {
    $_FILES["image"]["name"] = count(glob("img/*.png")) + count(glob("img/*.jpg")) + count(glob("img/*.jpeg")) . $ext;
    $file = basename($_FILES["image"]["name"]);

    if (!move_uploaded_file($_FILES["image"]["tmp_name"], "../annonces/img/" . $file))
      $error = "Echec de l'upload";

    $dbase = mysqli_connect("localhost", "savari_o", "sazapefo", "Costumeo");
    if (mysqli_connect_errno())
      $error = "Failed to connect to MySQL: " . mysqli_connect_error();
    else
    {
      $sql = 'INSERT INTO Offers (Product_name, Description, Image_link, Quantity, Price, Seller_name, Category, Date_of_posting, Sex, Quality, Display)
              VALUES ("' . $_POST["productName"] .
              '", "' . $_POST["description"] .
              '", "annonces/img/' . $file .
              '", ' . $_POST["quantity"] .
              ', ' . $_POST["price"] .
              ', "' . $_SESSION["Login"] .
              '", "' . $_POST["category"] .
              '", NOW()
              , "' . $_POST["sex"] .
              '", ' . $_POST["quality"] . ', 1);';
      mysqli_query($dbase, $sql);
    }
  }
  else
  {
    $error = "Vous avez choisi la mauvaise extension. Choisissez *.png, *.jpg ou *.jpeg";
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
          Votre annonce a été envoyée avec succès !<br>Un administrateur vérifira les informations avant de publier l'annonce.<br><br>
        <?php } else { ?>
          Un erreur est survenue :<br><?php echo $error; ?>
        <?php } ?>
      </div>
    <div style="height: 50%; width: 50%;"></div>
    <?php include "../footer.php"; ?>
    <?php include "../script.php"; ?>
  </body>
</html>