<!-- Template Main CSS File -->
 <link href="<?php echo base_url();?>assets/css/product.css" rel="stylesheet">
<?php echo validation_errors();
?>
<?php echo form_open('commande/get_fiche_commande/'.$infos); 
if($message != NULL){
  ?>
  <div class="alert alert-dark" role="alert">
    <?php echo $message; ?>.
  </div>
<?php
}
?>

<!-- ======= Add Articles Section ======= -->
<section id="team" class="team">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Articles</h2>
      <p>Récapitulatif commande</p>
    </div>

    <?php
          if($articles != NULL) {
            foreach($articles as $larticle){
              if(!isset($traite[$larticle['atc_idArticle']])){
                $atc_idArticle = $larticle['atc_idArticle'];
                ?>
    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-3 d-flex align-items-stretch">
        <div class="member" >
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
          <h3>Taille(s) prise(s):</h3>
            <?php 
            foreach($articles as $larti){
              if(strcmp($atc_idArticle,$larti['atc_idArticle'])==0){
                ?>
                <button class="size-button"><?php echo $larti['tle_nomTaille'];?></button>
                <h3>Quantité :</h3>
                <button class="size-button"><?php echo $larti['psr_quantite'];?></button> <?php
              }
            }
            $traite[$larticle['atc_idArticle']] =1;
          ?>
        </div>
      </div>
    </div> <?php
        }
      }
    }
  else{
  echo "Aucun Article";
  }?>
  <h3 class="total-panier">Total de votre panier : <span><?php echo $prix->pnr_prixPanier;?> €</span></h3>
  </div>
</section><!-- End Articles Section -->

<!-- ======= Add Collaborateur Section ======= -->
<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Client</h2>
      <p>Fiche commande</p>
    </div>

      <div class="col-lg-8 mt-5 mt-lg-0">
      <h3 class="rappel">Pour finaliser votre commande merci de remplir vos informations ci-dessous.</h3>
      <br>
        <form method="post" role="form" class="php-email-form">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="mail" id="mail" placeholder="Email" required>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Prénom" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Votre adresse" required>
            </div>
          </div>
          <br>
          <br>
          <br>
          <h3 class="rappel-panier">Rappel du total de votre panier : <span><?php echo $prix->pnr_prixPanier;?> €</span></h3>
          <button class="add-to-cart-button" type="submit" data-aos="fade-up" data-aos-delay="100">Confirmer</button>
        </form>

      </div>

    </div>

  </div>
</section><!-- End Add Collaborateur Section -->

<style>
  .total-panier {
    margin-top: 50px;
    margin-left: 30px;
  }

  .rappel-panier{
    display: block;
    width: 580px;
    margin: 40px auto;
    padding: 20px 20px;
    background-color: #ffff;
    color : black;
    border-style : solid;
    border-color: #ffc451;
    border-
    border-radius: 5px;
    font-family: "Poppins", sans-serif;
  }

  .rappel{
    margin-top: 40px;

  }
</style>

