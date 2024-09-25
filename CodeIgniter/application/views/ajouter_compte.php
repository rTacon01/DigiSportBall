<!-- Template Main CSS File -->
<link href="<?php echo base_url();?>assets/css/product.css" rel="stylesheet">

<?php 
echo form_open('compte/ajouter');
if(validation_errors() != NULL)
{
  ?>
  <div class="container" style ="margin-top: 60px;">
    <div class="alert alert-danger" id="affichage" role="alert" data-aos="fade-up" data-aos-delay="50">Alerte ⚠️: <a class="alert-link"><?php echo validation_errors();?> </a></div> 
  </div>
  <script>
      window.setTimeout("affichage_alerte();",8000);
      function affichage_alerte() {
      document.getElementById("affichage").style.display = 'none';
      }
  </script>
  <?php
}

if($_SESSION['username']== NULL){
  redirect(base_url()."index.php/compte/connexion");
  }
?>


<!-- ======= Add Compte Section ======= -->
<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Compte</h2>
      <p>Ajouter compte</p>
    </div>

      <div class="col-lg-8 mt-5 mt-lg-0">

        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Pseudo" required>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Prénom" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Mot de passe" required>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="email" name="mail" class="form-control" id="mail" placeholder="Mail" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="password" class="form-control" name="confirmemdp" id="confirmemdp" placeholder="Confirmation du mot de passe" required>
            </div>
          </div>
         <br>
          <div class="text-center"><button type="submit" class= "compte">Ajouter compte</button></div>
        </form>

      </div>

    </div>

  </div>
</section><!-- End Add Compte Section -->
