<?php
if($_SESSION['username'] == NULL){
  redirect(base_url()."index.php/compte/connexion");
  }
?>
<!-- ======= Collaborateur Section ======= -->
<section id="team" class="team">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Collaborateurs</h2>
      <p>Voici nos collaborateurs</p>
    </div>

    <div class="container mt-3">          
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Nom du collaborateur</th>
              <th>Prénom du collaborateur</th>
              <th>Pseudo du collaborateur</th>
              <th>Adresse mail du collaborateur</th>
              <th>Club du collaborateur</th>
              <th>Numéro  du collaborateur</th>
              <th>Numéro  de dossier du collaborateur</th>
              <th>Nombre de commandes</th>
              <th>Statut commande</th>
            </tr>
          </thead>
          <tbody>
          <?php
              if($collaborateurs != NULL) {
                foreach($collaborateurs as $collaborateur){?>
            <tr>
              <td><?php echo $collaborateur["prf_nomProfil"]?></td>
              <td><?php echo $collaborateur["prf_prenomProfil"]?></td>
              <td><?php echo $collaborateur["prf_pseudoProfil"]?></td>
              <td><?php echo $collaborateur["prf_adresseMailProfil"]?></td>
              <td><?php echo $collaborateur["clu_nomClub"]?></td>
              <td><?php echo $collaborateur["clb_numTelephone"]?></td>
              <td><?php echo $collaborateur["clb_numDossier"]?></td>
              <td><?php echo $collaborateur["Nombre_Commande"]?></td>
              <td><?php echo $collaborateur["Statut_Commande"]?></td>
            </tr>
            <?php
          }}
          else {echo "<br />";
              echo "Aucun collaborateur n’est présent dans l'application !";
              }
          ?>

          </tbody>
        </table>
    </div>
  </div>
  <a href="<?php echo base_url();?>index.php/accueil/afficher_admin"><button type="text" class="retour">Retour</button></a>
</section><!-- End Collaborateur Section -->

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