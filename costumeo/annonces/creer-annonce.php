<?php $path = "../";
  session_start();
  if (!isset($_SESSION["ID"]))
    header("Location: ../user/Identification.php");
?>
<!DOCTYPE html>
<html lang="fr">
  <?php include "../head.php"; ?>
  <body>
    <?php include "../header.php"; ?>
    <form action="upload.php" method="post" class="white-purple" enctype="multipart/form-data">
      <h1>Créer une annonce<span>Veuillez remplir tous les champs.</span></h1>
      <label><span>Nom du produit</span><input type="text" name="productName" required /></label>
      <label><span>Description</span><textarea type="text" name="description" required /></textarea></label>
      <span id="button"><span>Importer une image (*.jpg, *.png, *.jpeg)</span>
        <img id="loaded"></img>
        <div class="fileUpload btn btn-primary" name="image">
          <span>Parcourir...</span>
          <input name="image" type="file" class="upload" accept="image/*" onchange="readURL(this);" required/>
        </div>
      </span>
      <table id="create-opt">
        <tr>
          <td>
            <h3>Catégories du produit</h3>
          </td>
        </tr>
        <tr>
          <td>
            <input type="radio" name="sex" value="H" id="H" /><label class="opt" for="H"> Homme</label>
          </td>
          <td>
            <input type="radio" name="sex" value="F" id="F" /><label class="opt" for="F"> Femme</label>
          </td>
          <td>
            <input type="radio" name="sex" value="all" id="all" /><label class="opt" for="all"> Les deux</label><br/>
          </td>
        </tr>
        <tr>
          <td>
            <input type="radio" name="category" value="costume" id="costume2" /><label class="opt" for="costume2"> Costume</label>
          </td>
          <td>
            <input type="radio" name="category" value="decor" id="decor2" /><label class="opt" for="decor2"> Décor</label><br/>
          </td>
        </tr>
      </table>
      <label><span>Qualité du produit</span>
        <select class="form-control" name="quality">
          <option value="0" selected>Neuf</option>
          <option value="1">Occasion</option>
        </select>
      </label>
      <label><span>Quantité</span><input type="number" name="quantity" required /></label>
      <label><span>Prix unitaire</span><input type="text" name="price" pattern="\d+[.,]?\d{0,2}" required />€</label>
      <hr>
      <span id="button"><span></span><input type="submit" class="button" value="Envoyer" /></span>
    </form>
    <?php include "../footer.php"; ?>
    <?php include "../script.php"; ?>
    <script src="../js/readFile.js"></script>
  </body>
</html>