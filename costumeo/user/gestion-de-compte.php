<?php $path = "../"; ?>
<!DOCTYPE html>
<html lang="en">
  <?php include "../head.php"; ?>
  <body>
    <?php include "../header.php"; ?>
  <div id="liste">
    <h1>Gestion de compte</h1><hr class="hr-h1">
    <?php
      $dbase = mysqli_connect("localhost", "savari_o", "sazapefo", "Costumeo");
      $sql =  "SELECT * FROM Users WHERE ID = " . $_SESSION["ID"];
      $select = mysqli_query($dbase, $sql);
      $value = mysqli_fetch_assoc($select);
    ?>
     <form action="update-profile.php" method="post">
      <table style="text-align:center;" id="gestion">
        <tbody>
          <tr><td class="title"> Nom</td><td><input required name="Firstname" pattern='[^<>"]+' value="<?php echo $value["Firstname"];?>"</td></tr>
          <tr><td class="title"> Prenom</td><td><input required name="Lastname" pattern='[^<>"]+' value="<?php echo $value["Lastname"];?>"</td></tr>
          <tr><td class="title"> Login</td><td><input required name="Login" pattern='[^<>"]+' value="<?php echo $value["Login"];?>"</td></tr>
          <tr><td class="title"> Email</td><td><input required name="Email" pattern='[^<>"]+@[^<>"]+\.[^<>"]+' type="email"value="<?php echo $value["Email"];?>"</td></tr>
          <tr><td class="title"> Téléphone</td><td><input required name="tel" pattern="\d{10}" type="text" value="<?php echo $value["Phone"];?>"</td></tr>
          <tr><td class="title"> Mot de passe</td><td><input required name="Password" pattern='[^<>"]+' type="password" value="<?php echo $value["Password"];?>"</td></tr>
          <tr><td class="title"> Adresse</td><td><input required name="Address" pattern='[^<>"]+' value="<?php echo $value["Address"];?>"</td></tr>
          <tr><td class="title"> Code postal</td><td><input required name="Zip" pattern="\d{5}"value="<?php echo $value["Zip"];?>"</td></tr>
          <tr><td class="title"> Date de naissance</td><td><input required name="Birthdate" type="date" value="<?php echo $value["Birthdate"];?>"</td></tr>
        </tbody>
      </table>
      </form>
      <input class="update-profil" type="submit" name="update" value="Modifier votre profil">
      <h1>Mes annonces</h1>
      <hr class="hr-h1">
        <div>
        <ul id="liste-annonces">
            <?php
            $dbase = mysqli_connect("localhost", "savari_o", "sazapefo", "Costumeo");
            if (mysqli_connect_errno())
              $error = "Failed to connect to MySQL: " . mysqli_connect_error();
            else
            {
              $sql = "SELECT * FROM Offers WHERE Seller_name = '" . $_SESSION['Login'] . "'";
              $result = mysqli_query($dbase, $sql);
              while ($offer = mysqli_fetch_array($result))
              {
                echo '<li><a href="../annonces/annonce.php?id=' . $offer['ID'] . '"><img src="' . $path . $offer["Image_link"] . '" width="300" height="300"></img></a><br><span>' . $offer["Product_name"] . '</span></li>';
              }
            }
          ?>
        </ul>
      </div>
  </div>
    <?php include "../footer.php"; ?>
    <?php include "../script.php"; ?>
  </body>
</html>