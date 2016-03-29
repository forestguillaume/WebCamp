<?php
  if (!isset($path))
    $path = "";
  session_start();
  $dbase = mysqli_connect("localhost", "savari_o", "sazapefo", "Costumeo");
  if (mysqli_connect_errno())
    $error = "Failed to connect to MySQL: " . mysqli_connect_error();
  else
  {
    if (isset($_SESSION["ID"]) && $_SESSION["Role"] <= 2)
    {
      $sql = "SELECT COUNT(*) FROM Offers WHERE Display = 1";
      $news = mysqli_fetch_assoc(mysqli_query($dbase, $sql))["COUNT(*)"];
      if ($news == 0)
        $news = "";
      else
        $news = "(" . $news . ")";
    }
  }
?>
    <header class="clearfix fixed">
      <a href="<?php echo $path; ?>"><div class="logo col-md-3"><h2 class="logo-text"><img src="<?php echo $path; ?>img/LogoJoy.png" height='80px'>Costumeo</h2></div></a>
      <nav class="clearfix">
        <ul class="clearfix">
          <li id="searchbar">
            <div class="input-group" id="adv-search">
              <form class="form-horizontal" method="get" action="<?php echo $path; ?>annonces/recherche.php">
                <input type="text" class="form-control" name="search" placeholder="Recherche d'annonce" value="<?php echo $_GET["search"]; ?>"/>
                <div class="input-group-btn">
                  <div class="btn-group" role="group">
                    <div class="dropdown dropdown-lg">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                      <div class="dropdown-menu dropdown-menu-right" role="menu">
                        <div class="form-group">
                          <table id="search">
                            <thead>
                              <tr>
                                <th><label>Filtrer</label></th>
                                <th><label>Sexe</label></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><input type="radio" name="category" value="alltypes" id="alltypes" <?php if (!isset($_GET["category"]) || $_GET["category"] == "alltypes") echo "checked"; ?>><label class="opt" for="alltypes"> Tous les types</label></td>
                                <td><input type="radio" name="sex" value="allsex" id="allsex" <?php if (!isset($_GET["sex"]) || $_GET["sex"] == "allsex") echo "checked"; ?>><label class="opt" for="allsex"> Les deux</label></td>
                              </tr>
                              <tr>
                                <td><input type="radio" name="category" value="costume" id="costume" <?php if ($_GET["category"] == "costume") echo "checked"; ?>><label class="opt" for="costume"> Uniquement les costumes</label></td>
                                <td><input type="radio" name="sex" value="men" id="men" <?php if ($_GET["sex"] == "men") echo "checked"; ?>><label class="opt" for="men"> Homme</label></td>
                              </tr>
                              <tr>
                                <td><input type="radio" name="category" value="decor" id="decor" <?php if ($_GET["category"] == "decor") echo "checked"; ?>><label class="opt" for="decor"> Uniquement les décors</label></td>
                                <td><input type="radio" name="sex" value="women" id="women" <?php if ($_GET["sex"] == "women") echo "checked"; ?>><label class="opt" for="women"> Femme</label></td>
                              </tr>
                            </tbody>
                          </table><br>
                          <label>Trier par</label><br>
                          <select class="form-control" name="sort">
                            <option value="0" <?php if (!isset($_GET["sort"]) || $_GET["sort"] == 0) echo "selected"; ?>>Date de publication</option>
                            <option value="1" <?php if ($_GET["sort"] == 1) echo "selected"; ?>>Prix</option>
                            <option value="2" <?php if ($_GET["sort"] == 2) echo "selected"; ?>>Qualité</option>
                            <option value="3" <?php if ($_GET["sort"] == 3) echo "selected"; ?>>Quantité</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                  </div>
                </div>
              </div>
            </form>
          </li>
          <?php if (isset($_SESSION["ID"]) && $_SESSION["Role"] == 1) { ?>
            <li><a href="<?php echo $path; ?>admin/">Administration <?php echo $news; ?></a></li>
          <?php } if (isset($_SESSION["ID"])) { ?>
            <li><a href="<?php echo $path; ?>user/gestion-de-compte.php"><?php echo $_SESSION["Login"]; ?></a></li>
            <li><a href="<?php echo $path; ?>annonces/creer-annonce.php">Créer une annonce</a></li>
            <li><a href="<?php echo $path . 'annonces/recherche.php' ?>" class="last">Annonces</a></li>
            <li><a href="<?php echo $path; ?>user/deconnexion.php">Déconnexion</a></li>
          <?php } else { ?>
            <li><a href="<?php echo $path; ?>user/Identification.php">S'identifier</a></li>
            <li><a href="<?php echo $path; ?>user/Inscription.php">S'inscrire</a></li>
            <li><a href="<?php echo $path . 'annonces/recherche.php' ?>" class="last">Annonces</a></li>
          <?php } ?>
          <li><a href="<?php echo $path; ?>about/Contact.php" class="last">Contact</a></li>
        </ul>
      </nav>
      <div class="pullcontainer">
        <a href="#" id="pull"><span class="fa fa-bars fa-2x"></span></a>
      </div>
    </header>
    <div style="height:68px;"></div>