<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="<?php echo base_url();?>index.php/accueil/afficher_admin">DS<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="<?php echo base_url();?>index.php/accueil/afficher_admin">Accueil</a></li>
          <li class="dropdown"><a href="#"><span>Collaborateur</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?php echo base_url();?>index.php/collaborateur/ajouter">Ajouter Collaborateur</a></li>
              <li><a href="<?php echo base_url();?>index.php/collaborateur/voir">Voir les Collaborateurs</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Article</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?php echo base_url();?>index.php/article/ajouter" hidden >Ajouter un Article</a></li>
              <li><a href="<?php echo base_url();?>index.php/article/lister_articles">Voir les Articles</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto " href="<?php echo base_url();?>index.php/compte/ajouter">Compte</a></li>
          <li><a class="nav-link scrollto" href="<?php echo base_url();?>index.php/compte/afficher">Profil</a></li>
          <li><a class="nav-link scrollto" href="#contact" hidden >Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="<?php echo base_url();?>index.php/compte/deconnexion" class="get-started-btn scrollto">Déconnexion</a>

    </div>
  </header><!-- End Header -->