<!-- ======= Articles Section ======= -->
<section id="team" class="team">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Articles</h2>
      <p>Voici notre sélections d'articles</p>
    </div>

    <div class="row">

    <?php
    if($articles != NULL) {
    foreach($articles as $larticle){?>
      <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
        <div class="member" data-aos="fade-up" data-aos-delay="100">
          <div class="member-img">
            <img src="<?php echo base_url();?>documents/articles/<?php echo $larticle['atc_imageArticle'];?>" class="img-fluid" alt="">
          </div>
          <div class="member-info">
            <h4><?php echo $larticle['atc_nomArticle'];?></h4>
            <span><?php echo $larticle['atc_prixArticle'];?>€</span>
          </div>
        </div>
      </div>
      <?php 
      }}
      else{
      echo "Aucun articles est présent dans l'application !";
      }?>

  </div>
  <a href="<?php echo base_url();?>index.php/accueil/afficher_admin"><button type="text" class="retour">Retour</button></a>
</section><!-- End Articles Section -->

<style>

  .retour{
    display: block;
    width: 200px;
    margin: 20px auto;
    padding: 10px 20px;
    background-color: #ffc451;
    border: none;
    border-radius: 5px;
    font-family: "Poppins", sans-serif;
  }


</style>