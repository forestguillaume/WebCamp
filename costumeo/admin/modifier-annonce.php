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
            <th>Visible</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $dbase = mysqli_connect("localhost", "savari_o", "sazapefo", "Costumeo");
            $infos = "SELECT * FROM Offers WHERE ID = " . $_GET["id"];
            $value = mysqli_fetch_array(mysqli_query($dbase, $infos));
            echo "<tr id='" . $value["ID"] . "'>
                    <td> " . $value['Product_name'] . " </td>
                    <td> " . $value['Description'] . " </td>
                    <td> " . $value['Quantity'] . " </td>
                    <td> " . $value['Price'] . " </td>
                    <td> " . $value['Seller_name'] . " </td>
                    <td> " . $value['Date_of_posting'] . " </td>
                    <td> " . ($value['Sex'] == "all" ? "Mixte" : $value["Sex"]) . " </td>
                    <td> " . ($value['Quality'] == 0 ? "Neuf" : "Occasion") . " </td>
                    <td> " . ($value['Display'] == 0 ? "Invisible" : ($value['Display'] == 0 ? "En attente" : "Visible")) . " </td>
                  </tr>
                  <tr>
                    <td><input value=\"" . $value['Product_name'] . "\"></td>
                    <td><input value=\"" . $value['Description'] . "\"></td>
                    <td><input value=\"" . $value['Quantity'] . "\"></td>
                    <td><input value=\"" . $value['Price'] . "\"></td>
                    <td style='border-bottom: 0px; border-right: 0px; background-color: #D5D5E2'></td>
                    <td style='border-bottom: 0px; border-left: 0px; background-color: #D5D5E2''></td>
                    <td><select><option value='all' " . ($value['Sex'] == "all" ? "selected" : "") . ">Mixte</option><option value='H' " . ($value['Sex'] == "H" ? "selected" : "") . ">H</option><option value='F' " . ($value['Sex'] == "F" ? "selected" : "") . ">F</option></select></td>
                    <td><select><option value='0' " . ($value['Quality'] == 0 ? "selected" : "") . ">Neuf</option><option value='1' " . ($value['Quality'] == 1 ? "selected" : "") . ">Occasion</option></select></td>
                    <td><select><option value='0' " . ($value['Display'] == 0 ? "selected" : "") . ">Invisible</option><option value='1' " . ($value['Display'] == 1 ? "selected" : "") . ">En attente</option><option value='2' " . ($value['Display'] == 2 ? "selected" : "") . ">Visible</option></select></td>
                  </tr>";
          ?>
        </tbody>
      </table>
      <br><div id="edit">✍ Modifier l'annonce</div>
      <br><div id="delete">✕ Supprimer l'annonce</div>
    </div>
    <?php include "../footer.php"; ?>
    <?php include "../script.php"; ?>
    <script>
      function init() {
        $("#delete").off("click");
        $("#edit").off("click");
        $("#delete").click(function() {
          if (confirm("Êtes-vous sûr(e) de vouloir supprimer cette annonce ?")) {
            window.location = "supprimer-annonce.php?id=" + $("#tableau tbody tr").attr("id");
          }
        });
        $("#edit").click(function() {
          $("#tableau tbody tr:last-child").css("display", "table-row");
          $(this).text("✍ Sauvegarder");
          $(this).attr("id", "save");
          $(this).off("click");
          $(this).click(function() {
            var news = $("#tableau tbody tr:last-child input, #tableau tbody tr:last-child select");
            $.cookie("name", news.eq(0).val());
            $.cookie("description", news.eq(1).val());
            $.cookie("qty", news.eq(2).val());
            $.cookie("price", news.eq(3).val());
            $.cookie("sex", news.eq(4).val());
            $.cookie("quality", news.eq(5).val());
            $.cookie("disp", news.eq(6).val());
            window.location = "save.php?id=" + $("#tableau tbody tr").attr("id");
          });
          $("#delete").off("click");
          $("#delete").attr("id", "cancel");
          $("#cancel").text("✕ Annuler");
          $("#cancel").click(function() {
          if (confirm("Voulez-vous vraiment annuler les modifications ?")) {
            $("#tableau tbody tr:last-child").css("display", "none");
            $(this).attr("id", "delete");
            $(this).text("✕ Supprimer l'annonce");
            $("#save").attr("id", "edit");
            $("#edit").text("✍ Modifier l'annonce");
            init();
          }
          });
        });
      }
      init();
    </script>
  </body>
</html>