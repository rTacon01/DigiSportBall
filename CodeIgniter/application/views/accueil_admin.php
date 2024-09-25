<main id="main">
<?php 
  if($message == "compte ok")
  {
    ?>
      <div class="container" style ="margin-top: 60px;">
        <div class="alert alert-success" id="affichage" role="alert" data-aos="fade-up" data-aos-delay="100">Alerte : <a class="alert-link"><?php echo "La création du compte a bien été effectuée !";?> </a></div> 
      </div> 
    
      <script>
        window.setTimeout("display_alert();",4000);
        function display_alert() {
        document.getElementById("affichage").style.display = 'none';
        }
      </script>
    <?php
  }
  if($message == "Collaborateur ok")
  {
    ?>
      <div class="container" style ="margin-top: 60px;">
        <div class="alert alert-success" id="affichage" role="alert" data-aos="fade-up" data-aos-delay="100">Alerte : <a class="alert-link"><?php echo "La création du collaborateur a bien été effectuée !";?> </a></div> 
      </div> 
    
      <script>
        window.setTimeout("display_alert();",4000);
        function display_alert() {
        document.getElementById("affichage").style.display = 'none';
        }
      </script>
    <?php
  }
  ?>
<!-- ======= Historique Commande Section ======= -->
<section id="team" class="team">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Historique </h2>
      <p>Historique des commandes</p>
    </div>

    <div class="container mt-3">          
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Numéro de la commande</th>
              <th>Nom/Prénom du collaborateur</th>
              <th>Nom du club</th>
              <th>Date de la commande</th>
              <th>Nom/Prénom du client</th>
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
              <td><?php echo $lacommande["Nom_Collaborateur"]." ".$lacommande["Prenom_Collaborateur"]?></td>
              <td><?php echo $lacommande["clu_nomClub"]?></td>
              <td><?php echo $lacommande["cmd_dateCommande"]?></td>
              <td><?php echo $lacommande["Nom_Client"]." ".$lacommande["Prenom_Client"]?></td>
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

</main><!-- End #main -->