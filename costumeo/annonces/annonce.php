<?php $path = "../"; ?>
<!DOCTYPE html>
<html lang="en">
  <?php include "../head.php"; ?>
  <body>
    <?php include "../header.php"; ?>
      <div id="liste">
        <?php  
          $error = "no";
          $dbase = mysqli_connect("localhost", "savari_o", "sazapefo", "Costumeo");
          if (mysqli_connect_errno())
            $error = "Failed to connect to MySQL: " . mysqli_connect_error();
          else
            $sql = 'SELECT * FROM Offers WHERE ID = ' . $_GET["id"];
          if (!($user = mysqli_query($dbase, $sql))) 
            $error = "MySQL n'a pas pu effectuer la requête.";
          else
          {
            $result = mysqli_fetch_assoc($user);
            $phone = mysqli_fetch_assoc(mysqli_query($dbase, "SELECT Phone FROM Users WHERE Login = '" . $result["Seller_name"] . "'"))["Phone"];
            $select = mysqli_query($dbase, "SELECT * FROM Rate WHERE offer_ID = " . $_GET["id"]);
            if (mysqli_num_rows($select) > 0)
              $rate = mysqli_fetch_assoc($select);
            else
            {
              $rate["total_votes"] = 0;
              $rate["average"] = 0;
            }
          }
        ?>
        <h1 class="product_name">
          <?php
            echo $result["Product_name"];
          ?>
        </h1>
        <div id="details-annonce">
          <img src="<?php echo $path . $result["Image_link"]; ?>"></img>
           <form method="post" action="update-annonce.php?id=<?php echo $_GET["id"]; ?>">
             <span id="title"> Nom du vendeur :</span><span><br><?php echo $result["Seller_name"];?></span><br>
             <span id="title"> Contact :</span><span><br><?php echo (isset($_SESSION["Login"]) ? $phone : "Connectez-vous pour accéder à cette information.");?></span><br>
             <hr>
             <span id="title"> Description :</span><span><br><?php if ($_SESSION['Login'] == $result["Seller_name"]){echo '<textarea name="description" style="resize: none" type="text">' . $result['Description'] . '</textarea>';} else echo $result["Description"];?></span><br>
             <hr>
             <span id="title"> En stock :</span><span><br><?php if ($_SESSION['Login'] == $result["Seller_name"]){echo '<input name="quantity" pattern="\d+" type="text" value="' . $result["Quantity"] . '"';} else echo $result["Quantity"];?></span><br>
             <span id="title"> Prix unitaire :</span><span><br><?php if ($_SESSION['Login'] == $result["Seller_name"]){echo '<input name="prix" pattern="\d+" type="text" value="' . $result["Price"] . '"';} else echo $result["Price"];?></span><br>
             <span id="title"> Categorie :</span><span><br><?php if ($_SESSION['Login'] == $result["Seller_name"]){echo '<input name="cat" type="text" value="' . $result["Category"] . '"';} else echo $result["Category"];?></span><br>
             <span id="title"> Date de publication :</span><span><br><?php echo $result["Date_of_posting"];?></span><br>
             <span id="title"> Sexe :</span><span><br><?php if ($_SESSION['Login'] == $result["Seller_name"]){echo '<select name="sexe"><option ' . ($result['Sex'] == "all" ? "selected" : "") . '>Mixte</option><option  ' . ($result['Sex'] == "H" ? "selected" : "") . '>H</option><option ' . ($result['Sex'] == "F" ? "selected" : "") . '>F</option></select>';} else echo $result["Sex"];?></span><br>
             <span id="title"> Qualité :</span><span><br><?php if ($_SESSION['Login'] == $result["Seller_name"]){echo '<select name="quality"><option ' . ($result['Quality'] == "0" ? "selected" : "") . '>Neuf</option><option  ' . ($result['Quality'] == "1" ? "selected" : "") . '>Occasion</option></select>';} else echo $result["Quality"];?></span><br>
             <hr>
             <?php if ($_SESSION['Login'] == $result["Seller_name"]) { ?>
              <center><input type="submit" class="retourne-annonces" value="Modifier l'annonce"></center>
              <?php } ?>
           </form>
        </div>
        <div id="bloc-commentaire">
          <form method="post" action="post.php?id=<?php echo $_GET["id"]; ?>">
            <div class="rating"><!--
           --><a href="rate.php?rate=5&id=<?php echo $_GET["id"]; ?>" title="Donner 5 étoiles">☆</a><!--
           --><a href="rate.php?rate=4&id=<?php echo $_GET["id"]; ?>" title="Donner 4 étoiles">☆</a><!--
           --><a href="rate.php?rate=3&id=<?php echo $_GET["id"]; ?>" title="Donner 3 étoiles">☆</a><!--
           --><a href="rate.php?rate=2&id=<?php echo $_GET["id"]; ?>" title="Donner 2 étoiles">☆</a><!--
           --><a href="rate.php?rate=1&id=<?php echo $_GET["id"]; ?>" title="Donner 1 étoile">☆</a>
              <span style="float: right">Note des utilisateurs : <?php echo round($rate["average"], 1); ?> pour <?php echo $rate["total_votes"]; ?> votants</span>
            </div>
          </form>
        </div>
      </div>
    <?php include "../footer.php"; ?>
    <?php include "../script.php"; ?>
  </body>
</html>