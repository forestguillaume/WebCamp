<?php
  session_start();
  if (!isset($_SESSION["ID"]) || $_SESSION["Role"] > 2)
    header("Location: ../");
  $path = "../";
?>
<!DOCTYPE html>
<html lang="en">
  <?php include "../head.php"; ?>
  <body>
    <?php include "../header.php"; ?>
    <link rel="stylesheet" href="<?php echo $path; ?>css/admin.css">
    <div id="liste">
      <h1>Gestion des annonces</h1>
      <hr>
      <table id="tableau">
        <thead>
          <tr>
            <th>Nom du produit</th>
            <th>Description du produit</th>
            <th>Quantité disponible</th>
            <th>Prix unitaire</th>
            <th>Login du vendeur</th>
            <th>Date du post</th>
            <th>H / F</th>
            <th>Qualité</th>
            <th>Éditer</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $dbase = mysqli_connect("localhost", "savari_o", "sazapefo", "Costumeo");
            $infos = "SELECT * FROM Offers";
            $query = mysqli_query($dbase, $infos);
            for ($i = 0; $i <= mysqli_num_rows($query); $i++) {
            // while ($value = mysqli_fetch_assoc($query)) // Boucle while ne fonctionne pas, pour une raison inconnue :x
              $value = mysqli_fetch_assoc($query);
              echo "<tr " . ($value['Display'] == 1 ? "style='background-color: #FFE5A2'" : ($value['Display'] == 2 ? "style='background-color: #C5F5D2'" : '')) . "id=" . $value["ID"] . ">
                      <td> " . $value['Product_name'] . " </td>
                      <td> " . $value['Description'] . " </td>
                      <td> " . $value['Quantity'] . " </td>
                      <td> " . $value['Price'] . " </td>
                      <td> " . $value['Seller_name'] . " </td>
                      <td> " . $value['Date_of_posting'] . " </td>
                      <td> " . ($value['Sex'] == "all" ? "Mixte" : $value["Sex"]) . " </td>
                      <td> " . ($value['Quality'] == 0 ? "Neuf" : "Occasion") . " </td>
                      <td class='modify' onclick=\"document.location = 'modifier-annonce.php?id=" . $value["ID"] . "'\">Modifier / Supprimer</td>
                    </tr>";
            }
          ?>
        </tbody>
      </table>
    </div>
    <div style="height: 50%; width: 50%;"></div>
    <?php include "../footer.php"; ?>
    <?php include "../script.php"; ?>
    <script type="text/javascript">
      var cells = $("#tableau tbody td:not(.modify)");
      for (var i = 0; i < cells.length; i++) {
        var id = cells.eq(i).parent().attr("id");
        cells.eq(i).attr("onclick", "document.location = '../annonces/annonce.php?id=" + id + "'");
        cells.eq(i).hover(function() {
          $(this).siblings(":not(.modify)").css("background-color", "#A5A5B2");
          $(this).css("background-color", "#A5A5B2");
        }, function() {
          $(this).siblings(":not(.modify)").css("background-color", "initial");
          $(this).css("background-color", "initial");
        });
      }
    </script>
  </body>
</html>