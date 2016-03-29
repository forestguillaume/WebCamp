<?php $path = "../";?>
<!DOCTYPE html>
<html>
<?php include "../head.php"; ?>
  <body>
    <?php include "../header.php"; ?>
    <div id="liste">
      <div>
        <h1 class="h1-liste-annonce">Liste des annonces</h1>
      </div>
      <div class="form-group">
        <label>Trier par</label><br>
        <select class="form-control">
          <option value="0" <?php if (!isset($_GET["sort"]) || $_GET["sort"] == 0) echo "selected"; ?>>Date de publication</option>
          <option value="1" <?php if ($_GET["sort"] == 1) echo "selected"; ?>>Prix</option>
          <option value="2" <?php if ($_GET["sort"] == 2) echo "selected"; ?>>Qualité</option>
          <option value="3" <?php if ($_GET["sort"] == 3) echo "selected"; ?>>Quantité</option>
        </select>
      </div>
      <hr class="hr">
      <div>
        <ul id="liste-annonces">
          <?php
            $dbase = mysqli_connect("localhost", "savari_o", "sazapefo", "Costumeo");
            if (mysqli_connect_errno())
              $error = "Failed to connect to MySQL: " . mysqli_connect_error();
            else
            {
              if ($_GET["category"] == "costume")
                $request .= " AND Category = 'costume'";
              else if ($_GET["category"] == "decor")
                $request .= " AND Category = 'decor'";
              if ($_GET["sex"] == "men")
                $request .= " AND (Sex = 'H' OR Sex = 'all')";
              else if ($_GET["sex"] == "women")
                $request .= " AND (Sex = 'F' OR Sex = 'all')";

              if ($_GET["sort"] == "0")
                $sort = " ORDER BY Date_of_posting DESC";
              else if ($_GET["sort"] == "1")
                $sort = " ORDER BY Price";
              else if ($_GET["sort"] == "2")
                $sort = " ORDER BY Quality";
              else if ($_GET["sort"] == "3")
                $sort = " ORDER BY Quantity";
              else
                $sort = "";

              $search = preg_replace("/[\W]+/", " ", $_GET["search"]);
              $search = explode(' ', $search);
              $sql = "SELECT * FROM Offers WHERE Display = 2 AND (0";
              for ($i = 0; isset($search[$i]); $i++)
              {
                $sql .= " OR Product_name LIKE '%" . $search[$i] . "%' OR Description LIKE '%" . $search[$i] . "%'";
              }
              $sql .= ")" . $request . $sort;
              $result = mysqli_query($dbase, $sql);
              if (mysqli_num_rows($result) == 0)
                echo "<div>Aucune annonce trouvée pour cette recherche.";
              while ($offer = mysqli_fetch_array($result))
              {
                echo '<li><a href="annonce.php?id=' . $offer["ID"] . '"><img src="' . $path . $offer["Image_link"] . '" width="300" height="300"></img></a><br><span>' . $offer["Product_name"] . '</span></li>';
              }
            }
          ?>
        </ul>
      </div>
    </div>
    <div style="height: 50%; width: 50%;"></div>
    <?php include "../footer.php"; ?>
    <?php include "../script.php"; ?>
  </body>
</html>