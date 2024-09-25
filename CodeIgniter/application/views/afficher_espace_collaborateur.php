<?php
if($_SESSION['numdossier'] == NULL){
  redirect(base_url()."index.php/collaborateur/connexion_collaborateur");
  }
?>



<!-- Template Main CSS File -->
<link href="<?php echo base_url();?>assets/css/product.css" rel="stylesheet">

<!-- ======= Section Profil ======= -->
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="section-title">
      <h2>Informations </h2>
      <p>Espace Collaborateur de <?php echo $infos->prf_prenomProfil ." ".$infos->prf_nomProfil; ?></p>
    </div>
    

    <br>
    <br>
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="<?php echo base_url();?>documents/profils/<?php echo $infos->prf_imageProfil;?>" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?php echo $infos->prf_prenomProfil ." ".$infos->prf_nomProfil; ?></h5>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Prénom et Nom</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $infos->prf_prenomProfil ." ".$infos->prf_nomProfil; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Numéro de téléphone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $infos->clb_numTelephone; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Adresse mail</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $infos->prf_adresseMailProfil; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Ville du collaborateur</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $infos->clb_villeCollaborateur; ?></p>
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

<!-- ======= Section Profil ======= -->

<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="section-title">
      <h2>Informations </h2>
      <p>Informations du club <?php echo $infos->clu_nomClub; ?></p>
    </div>

    <br>
    <br>
    <div class="row">
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nom du club</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $infos->clu_nomClub; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Ville du club</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $infos->clu_villeClub; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Année du création du club</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $infos->clu_anneeClub; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Division du club</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $infos->clu_divisionClub; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Description du club</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $infos->clu_descriptionClub; ?></p>
              </div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="<?php echo base_url();?>documents/clubs/<?php echo $infos->clu_imageClub;?>" style="width: 150px;">
            <h5 class="my-3"><?php echo $infos->clu_nomClub; ?></h5>
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
          <?php
              if($commandes != NULL) {
                foreach($commandes as $lacommande){?>
            <tr>
              <td><?php echo $lacommande["cmd_numCommande"]?></td>
              <td><?php echo $lacommande["Nom_Client"]." ".$lacommande["Prenom_Client"]?></td>
              <td><?php echo $lacommande["prf_adresseMailProfil"]?></td>
              <td><?php echo $lacommande["clt_adresseClient"]?></td>
              <td><?php echo $lacommande["cmd_dateCommande"]?></td>
              <td><?php echo $lacommande["cmd_prixCommande"]." €"?></td>
              <td><?php echo $lacommande["cmd_statutCommande"]?></td>
            </tr>
            <?php
          }}
          else {echo "<br />";
              echo "Aucune commande n’est présente dans l'application !";
              }
          ?>

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
      <p>Articles disponibles pour votre club</p>
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

      <h3 class="ficheClub">Lien vers la fiche du club</h3>
      <a href="<?php echo base_url();?>index.php/club/get_fiche_club/<?php echo $infos->clu_nomClub; ?>"><button class ="fiche">Fiche du club</button></a>



  </div>
</section><!-- End Articles Section -->

<style>
    .fiche{
    display: block;
    width: 200px;
    margin: 20px auto;
    padding: 10px 20px;
    background-color: #ffc451;
    border: none;
    border-radius: 5px;
    font-family: "Poppins", sans-serif;
  }
  .ficheClub{
    display: block;
    margin-top: 20px;
    margin: 20px auto;
    font-family: "Poppins", sans-serif;
  }

</style>




