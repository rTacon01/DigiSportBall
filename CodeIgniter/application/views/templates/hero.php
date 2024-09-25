  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Digital Sport Ball<span>.</span></h1>
          <?php 
          if ($pseudo != NULL)
          {
            ?><h2><?php echo $pseudo;?> Vous êtes connecté.<?php
          }
          else
          {
            ?><h2>Pour vous rendre la vie plus facile.</h2><?php
          }?>
        </div>
      </div>

    </div>
  </section><!-- End Hero -->