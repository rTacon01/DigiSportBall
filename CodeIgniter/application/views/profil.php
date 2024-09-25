<?php
  if($_SESSION['username']== NULL){
    redirect(base_url()."index.php/compte/connexion");
    }
?>
<!-- ======= Section Profil ======= -->
<link href="<?php echo base_url();?>assets/css/product.css" rel="stylesheet">

<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="section-title">
        <h2>Profil</h2>
        <p>Voir votre profil</p>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="<?php echo base_url();?>documents/profils/<?php echo $infos->prf_imageProfil;?>" alt="avatar"
              class="rounded-circle img-fluid" id="imgProfil" style="width: 150px; margin-top: 30px;">
            <h5 class="my-3"><?php echo $infos->prf_prenomProfil ." ".$infos->prf_nomProfil; ?></h5>
            <p class="text-muted mb-1"><?php echo $infos->prf_pseudoProfil; ?></p>
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
                <p class="mb-0">Pseudo</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $infos->prf_pseudoProfil; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $infos->prf_adresseMailProfil; ?></p>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container py-5" name="btn_profil">

      <button type="text" class= "profil" style="margin-left:20em;width:8em;display:inline-block;">Modifier</button>
      <button type="text" class= "profil" style="margin-left:8em;display:inline-block;">Supprimer</button>

  </div>
</section>

<!-- ======= END Section Profil ======= -->

