<!-- Template Main CSS File -->
<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

<?php echo validation_errors();
?>
<?php echo form_open('collaborateur/connexion_collaborateur'); 
if($message != NULL){
  ?>
  <div class="container" style ="margin-top: 60px;">
    <div class="alert alert-danger" id="affichage" role="alert" data-aos="fade-up" data-aos-delay="50">Alerte ⚠️: <a class="alert-link"><?php echo $message;?> </a></div> 
  </div>
  <script>
      window.setTimeout("affichage_alerte();",8000);
      function affichage_alerte() {
      document.getElementById("affichage").style.display = 'none';
      }
  </script>
<?php
}
?>


<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Se connecter</h2>
              <p class="text-white-50 mb-5">Merci de rentrer votre numéro de dossier et votre mot de passe !</p>

              <div class="form-outline form-white mb-4">
                <input type="text" id="typeEmailX" class="form-control form-control-lg" name="numdossier" />
                <label class="form-label" for="typeEmailX">Numéro de dossier</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="typePasswordX" class="form-control form-control-lg" name="mdp"/>
                <label class="form-label" for="typePasswordX">Mot de passe</label>
              </div>

              <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Mot de passe oublié ?</a></p>

              <button class="btn btn-outline-light btn-lg px-5" type="submit" >Se connecter</button>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
</section>