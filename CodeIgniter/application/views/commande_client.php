<!-- ======= Section Profil ======= -->
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="section-title">
      <h2>Informations </h2>
      <p>Informations du client <?php echo $commandes->prf_nomProfil. " ". $commandes->prf_prenomProfil; ?></p>
    </div>

    <br>
    <br>
    <div class="row">
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nom du client</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $commandes->prf_nomProfil; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Prénom du client</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $commandes->prf_prenomProfil; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Adresse mail du client</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $commandes->prf_adresseMailProfil; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Adresse  du client</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $commandes->clt_adresseClient; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Numéro de la commande</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $commandes->cmd_numCommande; ?></p>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======= END Section Profil ======= -->

<!-- ======= Historique Commande Section ======= -->
<section id="team" class="team">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Historique </h2>
      <p>Votre historique de commandes</p>
    </div>

    <div class="container mt-3">          
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Numéro de la commande</th>
              <th>Nom/Prénom du client</th>
              <th>Adresse mail du client</th>
              <th>Adresse du client</th>
              <th>Date de la commande</th>
              <th>Prix commande</th>
              <th>Statut commande</th>
            </tr>
          </thead>
          <tbody>  
            <tr>
              <td><?php echo $commandes->cmd_numCommande?></td>
              <td><?php echo $commandes->prf_nomProfil. " ". $commandes->prf_prenomProfil?></td>
              <td><?php echo $commandes->prf_adresseMailProfil?></td>
              <td><?php echo $commandes->clt_adresseClient?></td>
              <td><?php echo $commandes->cmd_dateCommande?></td>
              <td><?php echo $commandes->cmd_prixCommande." €"?></td>
              <td><?php echo $commandes->cmd_statutCommande?></td>
            </tr>
          </tbody>
        </table>
    </div>
  </div>
</section><!-- End Historique Commande Section -->

<!-- ======= Articles Section ======= -->
<section id="team" class="team">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Articles</h2>
      <p>Articles commandés</p>
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
            <span>Prix à l'unité : <?php echo $larticle['atc_prixArticle'];?>€</span>
            <span>Quantité : <?php echo $larticle['psr_quantite'];?></span>
            <span>Taille(s) choisie(s) : <?php echo $larticle['tle_nomTaille'];?></span>
          </div>
        </div>
      </div>
      <?php 
      }}
      else{
      echo "Aucun articles est présent dans l'application !";
      }?>

  </div>
  <a href="<?php echo base_url();?>index.php/accueil/afficher"><button type="text" class="retour">Retour</button></a>
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