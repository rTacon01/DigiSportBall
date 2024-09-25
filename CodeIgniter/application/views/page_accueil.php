<main id="main">
  <?php 
  if($message != NULL)
  {
    ?>
      <div class="container" style ="margin-top: 60px;">
        <div class="alert alert-success" id="affichageCommande" role="alert" data-aos="fade-up" data-aos-delay="100">Alerte : <a class="alert-link"><?php echo "Votre commande a bien été effectuée !";?> </a></div> 
      </div> 
      <script>
        window.setTimeout("affichage_alerte_commande();",4000);
        function affichage_alerte_commande() {
        document.getElementById("affichageCommande").style.display = 'none';
        }
      </script>
    <?php
  }
  ?>

<!-- ======= About Section ======= -->
<section id="about" class="about">
  <div class="container" data-aos="fade-up">

    <div class="row">
      <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
        <img src="<?php echo base_url();?>assets/img/football-unisport.jpg" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
        <h3>Une entreprise spécialisée.</h3>
        <p>
          Chez DigiSportBall, nous sommes fiers de soutenir les clubs de football de la magnifique région des Côtes-d'Armor en Bretagne. 
          Nous sommes une entreprise spécialisée dans la vente d'articles de sport dédiés au football, offrant une large gamme d'équipements de qualité supérieure pour les joueurs, les entraîneurs et les supporters.
          Nos articles disponibles à la vente sont :
        </p>
        <ul>
          <li><i class="ri-check-double-line"></i> Maillots de football.</li>
          <li><i class="ri-check-double-line"></i> Chaussures de football.</li>
          <li><i class="ri-check-double-line"></i> Shorts de football.</li>
          <li><i class="ri-check-double-line"></i> Chaussettes.</li>
          <li><i class="ri-check-double-line"></i> Gants de gardien.</li>
          <li><i class="ri-check-double-line"></i> Des ballons.</li>
        </ul>
      </div>
    </div>

  </div>
</section><!-- End About Section -->

<!-- ======= About Section ======= -->
<section id="about" class="about">
  <div class="container" data-aos="fade-up">

    <div class="row">
      <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-right" data-aos-delay="100">
        <p>
        Notre mission est de fournir aux clubs de football les meilleurs équipements nécessaires pour exceller sur le terrain. 
        Nous proposons des maillots de football, des shorts, des chaussettes, des chaussures de football, des gants de gardien, des ballons et bien plus encore.
         Que ce soit pour les équipes amateurs ou professionnelles, nous avons tout ce dont les clubs ont besoin pour se préparer et performer lors des matchs.
        </p>
        <p>
        Découvrez la qualité exceptionnelle de nos articles de sport. 
        Fabriqués à partir de tissus haut de gamme, ils allient durabilité, confort et performance pour vous permettre de donner le meilleur de vous-même sur le terrain.
        </p>
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-left" data-aos-delay="100">
        <img src="<?php echo base_url();?>assets/img/chaussure.jpg" class="img-fluid" alt="">
      </div>
    </div>

  </div>
</section><!-- End About Section -->

<!-- ======= About Section ======= -->
<section id="about" class="about">
  <div class="container" data-aos="fade-up">

    <div class="row">
      <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
        <img src="<?php echo base_url();?>assets/img/about.jpg" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
        <p>
          Chez DigiSportBall, nous comprenons l'importance de la qualité et de la durabilité des équipements sportifs. 
          C'est pourquoi nous collaborons avec les meilleures marques de sport pour vous offrir des produits de haute qualité. 
          Nous sommes passionnés par le football et nous nous efforçons de fournir des articles qui répondent aux besoins spécifiques des clubs de la région des Côtes-d'Armor.
          Nous nous engageons à fournir un service de qualité supérieure et une expérience client exceptionnelle à tous nos partenaires.
        </p>
        <p>
        Que vous soyez un club de football en quête de nouveaux équipements ou un joueur passionné à la recherche du matériel idéal, Sports Pro est là pour répondre à vos besoins. 
          Faites confiance à notre expertise et à notre engagement envers l'excellence pour équiper votre équipe et représenter fièrement les couleurs des Côtes-d'Armor sur les terrains de football.
        </p>
        
      </div>
    </div>

  </div>
</section><!-- End About Section -->

<!-- ======= Services Section ======= -->
<section id="services" class="services">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Services</h2>
      <p>Nos services</p>
    </div>

    <div class="row">
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon-box">
          <div class="icon"><img width="30" height="30" src="<?php echo base_url();?>assets/img/icone/maillot-de-foot.png"  /></div>
          <h4><a href="">Maillots de football</a></h4>
          <p>Nous offrons à la ventes une large gamme de maillots de football</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
        <div class="icon-box">
          <div class="icon"><img width="30" height="30" src="<?php echo base_url();?>assets/img/icone/joueur-de-football.png"  /></div> 
          <h4><a href="">Chaussures de football</a></h4>
          <p>Nous offrons à la ventes une large gamme de chaussures de football</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
        <div class="icon-box">
          <div class="icon"><img width="30" height="30" src="<?php echo base_url();?>assets/img/icone/short.png"  /></div>
          <h4><a href="">Shorts de football</a></h4>
          <p>Nous offrons à la ventes une large gamme de shorts de football</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon-box">
          <div class="icon"><img width="30" height="30" src="<?php echo base_url();?>assets/img/icone/chaussettes-de-football.png"  /></div>
          <h4><a href="">Chaussettes</a></h4>
          <p>Nous offrons à la ventes une large gamme de chaussettes de football</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="icon-box">
          <div class="icon"><img width="30" height="30" src="<?php echo base_url();?>assets/img/icone/gardien-de-but.png"  /></div>
          <h4><a href="">Gants de gardien</a></h4>
          <p>Nous offrons à la ventes une large gamme de gats destinés aux gardiens de football</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
        <div class="icon-box">
          <div class="icon"><img width="30" height="30" src="<?php echo base_url();?>assets/img/icone/ballon-de-football.png"  /></div>
          <h4><a href="">Ballons de football</a></h4>
          <p>Nous offrons à la ventes une large gamme de ballons de football</p>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Services Section -->

<!-- ======= Cta Section ======= -->
<section id="cta" class="cta">
  <div class="container" data-aos="zoom-in">

    <div class="text-center">
      <h3>Une diversité de maillots reconnus</h3>
      <p> Notre entreprise se distingue par sa passion inébranlable pour le football, ce qui se reflète dans notre gamme d'articles exceptionnels. Des chaussures de pointe aux équipements de protection de qualité supérieure, nous offrons tout ce dont les joueurs ont besoin pour exceller sur le terrain et atteindre leur plein potentiel. En collaborant avec les meilleures marques de l'industrie, nous garantissons des produits de première qualité qui allient confort, durabilité et performances de pointe, permettant ainsi aux footballeurs de vivre leur passion avec confiance et assurance.</p>
      <p>En plus de notre engagement envers la qualité, nous sommes également fiers de proposer une sélection diversifiée d'articles de football pour répondre aux besoins et aux préférences de tous les joueurs, des débutants aux professionnels confirmés. Que vous cherchiez des maillots de clubs renommés, des ballons de match de haute qualité ou des accessoires indispensables tels que des protège-tibias et des gants de gardien de but, notre entreprise est votre destination ultime pour tous vos besoins en matière de football. Faites confiance à notre expertise et à notre engagement envers l'excellence pour élever votre jeu vers de nouveaux sommets.</p>
    </div>

  </div>
</section><!-- End Cta Section -->

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Articles</h2>
      <p>Petite sélection de nos articles</p>
    </div>

    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

    <?php
    if($articles != NULL) {
    foreach($articles as $larticle){?>
      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <div class="portfolio-wrap">
          <img src="<?php echo base_url();?>documents/articles/<?php echo $larticle['atc_imageArticle'];?>" class="img-fluid" alt="">
        </div>
      </div>
      <?php 
      }}
      else{
      echo "Aucun articles est présent dans l'application !";
      }?>

    </div>

  </div>
</section><!-- End Portfolio Section -->

<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">
  <div class="container" data-aos="zoom-in">

    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">

        <div class="swiper-slide">
          <div class="testimonial-item">
            <img src="<?php echo base_url();?>assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
            <h3>Saul Goodman</h3>
  
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Grâce à vous, j'ai pu commander tous les articles pour mon fils.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item">
            <img src="<?php echo base_url();?>assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
            <h3>Sara Wilsson</h3>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Au nom de notre équipe de football, je tiens à exprimer ma profonde gratitude envers votre entreprise. Vos articles de sport de haute qualité ont véritablement amélioré notre jeu et renforcé notre esprit d'équipe. Merci de nous avoir fourni les équipements nécessaires pour atteindre de nouveaux sommets. Nous sommes fiers de porter vos produits et nous sommes impatients de poursuivre notre collaboration fructueuse dans le futur.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item">
            <img src="<?php echo base_url();?>assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
            <h3>Jena Karlis</h3>
            <h4>Store Owner</h4>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Je viens tout juste de recevoir mon maillot commandé sur le site et je suis absolument ravi de mon achat ! La qualité du maillot est exceptionnelle, avec des finitions impeccables et un tissu doux et confortable. Le design est à la fois moderne et élégant, avec des couleurs vives qui ressortent vraiment.

J'ai été impressionné par la facilité de navigation sur le site, ce qui m'a permis de trouver rapidement le maillot que je recherchais. De plus, le processus de commande était simple et sécurisé. J'ai également apprécié la rapidité de la livraison. Mon maillot est arrivé dans les délais annoncés, parfaitement emballé et en excellent état.

Le service client a été exemplaire. J'ai posé quelques questions avant de passer ma commande et j'ai reçu des réponses rapides et précises. Ils ont vraiment fait preuve d'un professionnalisme remarquable et d'une grande disponibilité.

Je recommande vivement le site à tous les passionnés de maillots de qualité. Leur sélection est variée et les produits proposés sont vraiment exceptionnels. Vous ne serez pas déçu de votre achat !
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item">
            <img src="<?php echo base_url();?>assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
            <h3>Matt Brandon</h3>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Je tenais à prendre un moment pour vous remercier sincèrement pour la qualité exceptionnelle des articles de sport que vous proposez. Votre entreprise a véritablement dépassé nos attentes, tant en termes de produits que de service client. Grâce à vous, nous sommes équipés avec fierté et confiance, prêts à donner le meilleur de nous-mêmes sur le terrain. Nous sommes reconnaissants de pouvoir compter sur votre expertise et votre engagement envers l'excellence. Merci encore pour votre précieuse contribution à notre passion pour le sport.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>
        </div><!-- End testimonial item -->

      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>
</section><!-- End Testimonials Section -->

<!-- ======= Counts Section ======= -->
<section id="counts" class="counts">
  <div class="container" data-aos="fade-up">

    <div class="row no-gutters">
      <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start" data-aos="fade-right" data-aos-delay="100"></div>
      <div class="col-xl-7 ps-0 ps-lg-5 pe-lg-1 d-flex align-items-stretch" data-aos="fade-left" data-aos-delay="100">
        <div class="content d-flex flex-column justify-content-center">
          <h3>DigiSportBall en quelques chiffres</h3>
          <p>
            Voici en quelques chiffres, ce que DigiSportBall a pu réaliser depuis ses débuts.
          </p>
          <div class="row">
            <div class="col-md-6 d-md-flex align-items-md-stretch">
              <div class="count-box">
                <i class="bi bi-emoji-smile"></i>
                <span data-purecounter-start="0" data-purecounter-end="<?php echo $commandes->NOMBRE_COMMANDE;?>" data-purecounter-duration="2" class="purecounter"></span>
                <p><strong>Commandes efffectuées :</strong> Voici le nombre de commandes effectuées sur l'application.</p>
              </div>
            </div>

            <div class="col-md-6 d-md-flex align-items-md-stretch">
              <div class="count-box">
                <i class="bi bi-cart4"></i>
                <span data-purecounter-start="0" data-purecounter-end="<?php echo $article->NOMBRE_ARTICLE;?>" data-purecounter-duration="2" class="purecounter"></span>
                <p><strong>Articles :</strong> Voici le nombre d'articles présents dans l'application.</p>
              </div>
            </div>

            <div class="col-md-6 d-md-flex align-items-md-stretch">
              <div class="count-box">
                <i class="bi bi-person-fill"></i>
                <span data-purecounter-start="0" data-purecounter-end="<?php echo $comptes->NOMBRE_COMPTE;?>" data-purecounter-duration="4" class="purecounter"></span>
                <p><strong>Comptes :</strong>Voici le nombre de comptes présents dans l'application.</p>
              </div>
            </div>

            <div class="col-md-6 d-md-flex align-items-md-stretch">
              <div class="count-box">
                <i class="bi bi-shield-shaded"></i>
                <span data-purecounter-start="0" data-purecounter-end="<?php echo $clubs->NOMBRE_CLUB;?>" data-purecounter-duration="4" class="purecounter"></span>
                <p><strong>Clubs :</strong> Voici le nombre de clubs présents dans l'application.</p>
              </div>
            </div>
          </div>
        </div><!-- End .content-->
      </div>
    </div>

  </div>
</section><!-- End Counts Section -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact" hidden>
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Contact</h2>
      <p>Nous contacter</p>
    </div>

    <div>
      <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.421339349558!2d2.3306280754783226!3d48.86924389994395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e3089806b6f%3A0x7d705243d7baea8c!2s36%20Av.%20de%20l&#39;Op%C3%A9ra%2C%2075002%20Paris!5e0!3m2!1sfr!2sfr!4v1684156816328!5m2!1sfr!2sfr" frameborder="0" allowfullscreen></iframe>
    </div>

    <div class="row mt-5">

      <div class="col-lg-4">
        <div class="info">
          <div class="address">
            <i class="bi bi-geo-alt"></i>
            <h4>Localisation:</h4>
            <p>36 Bis Avenue Opera 75002 Paris, FRANCE</p>
          </div>

          <div class="email">
            <i class="bi bi-envelope"></i>
            <h4>Email:</h4>
            <p>chris.howard@example.com</p>
          </div>

          <div class="phone">
            <i class="bi bi-phone"></i>
            <h4>Téléphone:</h4>
            <p>01 42 66 12 84</p>
          </div>

        </div>

      </div>

      <div class="col-lg-8 mt-5 mt-lg-0">

        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Ton Nom" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Ton Email" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Le Sujet" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Chargement</div>
            <div class="error-message"></div>
            <div class="sent-message">Ton message a bien été envoyé. merci!</div>
          </div>
          <div class="text-center"><button type="submit">Envoyer Message</button></div>
        </form>

      </div>

    </div>

  </div>
</section><!-- End Contact Section -->

</main><!-- End #main -->