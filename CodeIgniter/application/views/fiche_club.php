<!-- Template Main CSS File -->
<link href="<?php echo base_url();?>assets/css/product.css" rel="stylesheet">
<!-- Template Main JS File -->
<script src="<?php echo base_url();?>assets/js/product.js"></script>

<style>    
    #club-logo {
      display: block;
      margin: 0 auto;
      width: 150px;
      height: 150px;
      object-fit: contain;
    }
  </style>

<!-- ======= Add Club Section ======= -->
<section id="team" class="team" style="background-color: #eee;">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Club</h2>
      <p><?php echo $infos->clu_nomClub; ?></p>
    </div>
    
    <img id="club-logo" src="<?php echo base_url();?>documents/clubs/<?php echo $infos->clu_imageClub;?>" alt="Logo du club">
    <br>
    <br>
    <div class="row d-flex justify-content-center align-items-center" >
      <div class="col-lg-10">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nom du club</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $infos->clu_nomClub;?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Ville du club</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $infos->clu_villeClub;?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Année de création du club</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $infos->clu_anneeClub;?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Division du club</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $infos->clu_divisionClub;?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-lg-3">
                <p class="mb-0">Description du club</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $infos->clu_descriptionClub;?></p>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- ======= END Club Section ======= -->

<!-- ======= Add Articles Section ======= -->
<section id="articles" class="team">
  <div class="container" id="test" data-aos="fade-up">

    <div class="section-title">
      <h2>Articles</h2>
      <p>Voici notre sélection d'articles</p>
    </div>

    <?php
    if($articles != NULL) {
      foreach($articles as $larticle){
        if(!isset($traite[$larticle['atc_idArticle']])){
          $atc_idArticle = $larticle['atc_idArticle'];
          ?>
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-3 d-flex align-items-stretch">
              <div class="member">
                <div class="member-img">
                  <img src="<?php echo base_url();?>documents/articles/<?php echo $larticle["atc_imageArticle"];?>" class="img-fluid" alt="">
                </div>
                <div class="member-info">
                  <h4><?php echo $larticle["atc_nomArticle"];?></h4> <!-- Nom de l'article -->
                  <span><?php echo $larticle["atc_prixArticle"];?>€</span> <!-- Prix de l'article -->
                </div>
              </div>
            </div>

            <div class="col-lg-9 d-flex align-items-stretch">
              <div class="member-info">
                <h2><?php echo $larticle["atc_nomArticle"];?></h2>
                <h3>Tailles disponibles:</h3>
                <?php 
                foreach($articles as $larti){
                  if(strcmp($atc_idArticle,$larti['atc_idArticle'])==0){
                    ?>
                    <button class="size-button" onclick="choisirTaille('<?php echo $larti['tle_idTaille'];?>')"><?php echo $larti['tle_nomTaille'];?></button>
                    <?php
                  }
                }
                $traite[$larticle['atc_idArticle']] = 1;
                ?>

                <h3>Quantité:</h3>
                <input type="number" class="quantity-input" value="1" min="1" max="10" id="<?php echo $quantityInput = "quantityInput". $larticle['atc_idArticle'];?>">
                
                <h3>Prix : <?php echo $larticle["atc_prixArticle"];?>€</h3>
                <button class="add-to-cart-button" type="submit" data-aos="fade-up" data-aos-delay="100" onclick="ajouterPanier(<?php echo $_SESSION['id_profil']->prf_idProfil;?>, '<?php echo $atc_idArticle;?>', <?php echo $larticle['atc_prixArticle'];?>, '<?php echo $infos->clu_nomClub;?>', '<?php echo $quantityInput;?>')">Ajouter au panier</button>
              </div>
            </div>
          </div>
          <?php
        }
      }
    } else {
      echo "Aucun Article";
    }
    ?>
  </div>
  <h3 class="total-panier" data-aos="fade-up" data-aos-delay="100" style ="margin-left = 60px;">Total de votre panier : <span><?php echo $prix->pnr_prixPanier;?> €</span></h3>
</section><!-- End Articles Section -->

<!-- ======= Add ArticlesCommande Section ======= -->
<section id="team" class="team">
  <div class="container" id="test" data-aos="fade-up">

    <div class="section-title">
      <h2>Articles</h2>
      <p id="recap">Récapitulatif : Article(s) choisi(s) :</p>
    </div>

    <?php
    if($articles1 != NULL) {
      foreach($articles1 as $larticle1){
        if(!isset($traite1[$larticle1['atc_idArticle']])){
          $atc_idArticle1 = $larticle1['atc_idArticle'];
          ?>
          <div class="row" data-aos="fade-up" data-aos-delay="100">
          <a type="submit" onclick="deleteArticle('<?php echo $_SESSION['id_panier']->pnr_idPanier;?>', '<?php echo $larticle1['atc_idArticle'];?>', '<?php echo $larticle1['atc_prixArticle'];?>', '<?php echo $larticle1['idTaille'];?>','<?php echo $larticle1['psr_quantite'];?>', '<?php echo $infos->clu_nomClub;?>')"><img class="croix" src="<?php echo base_url();?>assets/img/croix.png" style ="width: 15px; float: right;"></a>
            <div class="col-lg-3 d-flex align-items-stretch">
              <div class="member">
                <div class="member-img">
                  <img src="<?php echo base_url();?>documents/articles/<?php echo $larticle1["atc_imageArticle"];?>" class="img-fluid" alt="">
                </div>
                <div class="member-info">
                  <h4><?php echo $larticle1["atc_nomArticle"];?></h4> <!-- Nom de l'article -->
                  <span><?php echo $larticle1["atc_prixArticle"];?>€</span> <!-- Prix de l'article -->
                </div>
              </div>
            </div>

            <div class="col-lg-9 d-flex align-items-stretch">
              <div class="member-info">
                <h2><?php echo $larticle1["atc_nomArticle"];?></h2>
                <h3>Taille(s) prise(s):</h3>
                <?php 
                foreach($articles1 as $larti1){
                  if(strcmp($atc_idArticle1,$larti1['atc_idArticle'])==0){
                    ?>
                    <button class="size-button"><?php echo $larti1['tle_nomTaille'];?></button>
                    <h3>Quantité :</h3>
                    <button class="size-button"><?php echo $larti1['psr_quantite'];?></button>
                    <?php
                  }
                }
                $traite1[$larticle1['atc_idArticle']] = 1;
                ?>
              </div>
            </div>
          </div>
          <?php
        }
      }
    } else {
      echo "Vous n'avez pas encore sélectionné d'articles !";
    }
    ?>

  <h3 class="rappel">Rappel du total de votre panier : <span><?php echo $prix->pnr_prixPanier;?> €</span></h3>
    <a href="<?php echo base_url();?>index.php/commande/get_fiche_commande/<?php echo $infos->clu_nomClub;?>">
      <button class="toto" type="submit">Passer à la commande</button>
    </a>
  </div>
</section><!-- End ArticlesCommande Section -->

<style>
  .total-panier {
    margin-top: 50px;
    margin-left: 52px;
  }

  .toto{
    display: block;
    width: 200px;
    margin: 40px auto;
    padding: 10px 20px;
    background-color: #ffc451;
    border: none;
    border-radius: 5px;
    font-family: "Poppins", sans-serif;
  }

  .rappel{
    margin-top: 40px;

  }
</style>