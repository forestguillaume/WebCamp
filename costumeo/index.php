<!DOCTYPE html>
<html lang="fr">
  <?php include "head.php"; ?>
  <body>
    <?php include "header.php"; ?>
    <div id="oModal" class="modal fade" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" style="width:900px">
        <div class="modal-content">
          <div class="modal-header">
            <button title="Fermer la fenêtre" class="close" type="button" data-dismiss="modal">×</button>
            <h2>Mode d'emploi</h2>
          </div>
          <div class="modal-body">
            <p>Le site s'utilise en trois étapes : </p>
            <div id="modedemploi">
              <div>
                <div>
                  <img src="http://a.dryicons.com/files/graphics_previews/develop_your_idea.jpg" height="200" width="200">
                </div>
                <div>
                 <h1 style="font-size: 20px">Trouvez votre costume :</h1>
                 Faites une recherche simple en écrivant dans la barre de recherche
                 qui est situé un peu plus haut dans le site.<br>
                 Vous avez la possibilité d'affiner votre recherche 
                 grâce à différents filtres.
                </div>
              </div>
  
              <div id="img-modedemploi">
                <div>
                  <div>
                    <img src="http://img.freepik.com/vecteurs-libre/homme-d&amp;-39;affaires-travaillant-sur-son-ordinateur_23-2147516104.jpg?size=338&amp;ext=jpg" height="200" width="200">
                  </div>
                  <div>
                    <h1 style="font-size: 20px">Valorisez votre stock:</h1>
                    De Nombreux articles de différentes qualités vous attendent que ce soit des costumes d'occasion ou des neufs proposés par des professionels.
                  </div>
                </div>
              </div>
  
              <div> 
                <div>
                  <img src="img/modemploi3.jpg" height="200" width="200">
                </div>
                <div>
                  <h1 style="word-wrap:break-word; text-align:center; font-size: 20px">Vendez-Louez-Troquez :</h1>
                  Vous avez des costumes ?<br>
                  mettez les en vente ou en location. Pour cela connecter vous en vous identifiant ou sinon inscrivez-vous sur le site.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="banner">
      <ul>
        <li style="background-image: url('img/segerstrom-center-alvin-ailey-american-dance-theater-in-alvin-ailey-s-revelations-photo-by-gert-krautbauer.jpg');">
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <div class="hero-title">
                  Costumeo<br>
                  <span class="hero-title-slogan">Le partage sans défaut</span>
                </div>
                <br><br>
                <a class="hero-btn" data-toggle="modal" href="#oModal">Mode d'emploi</a>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="h2-wrap">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="standard-block">DERNIERES ANNONCES</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid container-articles">
      <div class="row articles">
        <?php
          $dbase = mysqli_connect("localhost", "savari_o", "sazapefo", "Costumeo");
          if (mysqli_connect_errno())
            $error = "Failed to connect to MySQL: " . mysqli_connect_error();
          else
          {
            $i = 0;
            $select = mysqli_query($dbase, "SELECT * FROM Offers WHERE Display = 2 ORDER BY Date_of_posting DESC LIMIT 12");
            while ($item = mysqli_fetch_array($select)) {
            echo '<a href="annonces/annonce.php?id=' . $item["ID"] . '">
                    <div class="col-md-2 article-img square" ">
                      <img src="' . $item["Image_link"] . '" alt="">
                    <div class="article-overlay"></div>
                    </div>
                  </a>';
              $i++;
            }
            for (; $i < 12; $i++)
            {
              echo '<a href="#">
                      <div class="col-md-2 article-img square" ">
                        <img src="" alt="">
                      <div class="article-overlay"></div>
                      </div>
                    </a>';
            }
          }
        ?>
      </div>
    </div>

    <div class="quote-container">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-10 col-md-offset-1">
              <div class="quote-slideshow">
                <figure class="show"><h2 style="text-align: center;">Bienvenue sur le site Costumeo ! </h2>
                  <figcaption>
                    Le partage sans défaut
                  </figcaption>
                </figure>
                <figure><h2>Vous trouverez une multitude de costumes & décors sur ce site, il ne vous reste plus qu'à choisir !</h2>
                <figcaption>
                  Le partage sans défaut
                </figcaption>
                </figure>
              </div>
            </div>
            <span class="quote-prev circle"><i class="fa fa-angle-left fa-2x"></i></span>
            <span class="quote-next circle"><i class="fa fa-angle-right fa-2x"></i></span>
          </div>
        </div>
      </div>
    </div>
    <div class="shadow"></div>
    <?php include "footer.php"; ?>
    <?php include "script.php"; ?>
    <script type="text/javascript">
      window.onresize = function resize() {
        $("[class='col-md-2 article-img square'] img").css('height', $("[class='col-md-2 article-img square']").css('width'));
      }
      $("[class='col-md-2 article-img square'] img").css('height', $("[class='col-md-2 article-img square']").css('width'));
    </script>
  </body>
</html>

