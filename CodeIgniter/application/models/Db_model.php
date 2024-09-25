<?php
class Db_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }

    /***
     * Cette fonction permet la connexion d'un administrateur à l'application en verifiant le couple d'informations
     * pseudo/mot de passe avec les informations présents dans la BDD de l'application.
     */
    public function connect_compte($username, $password)
    {
        $query =$this->db->query("SELECT prf_pseudoProfil,prf_motDePasseProfil
                                  FROM t_profil_prf
                                  WHERE prf_pseudoProfil='".$username."'
                                  AND prf_motDePasseProfil='".$password."';");
        if($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    /***
     * Cette fonction permet la connexion d'un collaborateur à l'application en verifiant le couple d'informations
     * numéro de dossier/mot de passe avec les informations présents dans la BDD de l'application.
     */
    public function connect_collaborateur($numDossier, $password)
    {
        $query =$this->db->query("SELECT clb_numDossier, prf_motDePasseProfil
                                  FROM t_collaborateur_clb
                                  JOIN t_profil_prf USING(prf_idProfil)
                                  WHERE clb_numDossier = '".$numDossier."' 
                                  AND prf_motDePasseProfil = '".$password."';");
        if($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /***
     * Cette fonction permet la connexion d'un client à sa commande en verifiant le couple d'informations
     * numéro de commande/mot de passe avec les informations présents dans la BDD de l'application.
     */
    public function connect_commande($numcommande, $password)
    {
        $query =$this->db->query("SELECT prf_motDePasseProfil, prf_motDePasseProfil
                                  FROM t_commande_cmd
                                  JOIN t_client_clt USING(prf_idProfil)
                                  JOIN t_profil_prf USING(prf_idProfil)
                                  WHERE cmd_numCommande = '".$numcommande."'
                                  AND prf_motDePasseProfil = '".$password."';");

        if($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /***
     * Cette fonction permet d'afficher toutes les informations des Collaborateurs présents dans la BDD de l'application
     */
    public function get_all_collaborateurs()
    {
        $query =$this->db->query("SELECT prf_nomProfil, prf_prenomProfil, prf_pseudoProfil, prf_adresseMailProfil, prf_imageProfil, clu_nomClub, clb_numTelephone, clb_numDossier, donner_nombre_commande(prf_idProfil) AS Nombre_Commande, get_statut_commande(prf_idProfil) AS Statut_Commande
                                  FROM t_collaborateur_clb
                                  JOIN t_profil_prf USING(prf_idProfil)
                                  JOIN t_club_clu USING(prf_idProfil);");
        return $query->result_array();
    }

     /***
     * Cette fonction permet d'afficher le nombre de commandes pour chaque Collaborateurs
     */
    public function get_nb_commande_collaborateurs()
    {
        $query =$this->db->query("SELECT prf_nomProfil, prf_prenomProfil, prf_pseudoProfil, prf_adresseMailProfil, prf_imageProfil, clb_villeCollaborateur, clb_numTelephone, clb_numDossier
                                  FROM t_collaborateur_clb
                                  JOIN t_profil_prf USING(prf_idProfil);");
        return $query->result_array();
    }

     /***
     * Cette fonction permet d'afficher toutes les informations d'un compte selon le pseudo de ce compte.
     */
    public function get_infos_compte($pseudo)
    {
        $query =$this->db->query("SELECT prf_nomProfil, prf_prenomProfil, prf_pseudoProfil, prf_adresseMailProfil, prf_imageProfil
                                  FROM t_profil_prf
                                  WHERE prf_pseudoProfil = '".$pseudo."';");
        return $query->row();
    }

     /***
     * Cette fonction permet de récupérer toutes les informations liés aux articles présents dans la BDD de l'application.
     */
    public function get_all_articles()
    {
        $query =$this->db->query("SELECT * FROM t_article_atc;");
        return $query->result_array();
    }

     /***
     * Cette fonction permet de récupérer toutes les informations liés aux articles présents dans la BDD de l'application avec une limite d'affichage de 6 articles.
     */
    public function get_all_articles_limite()
    {
        $query =$this->db->query("SELECT * FROM t_article_atc ORDER BY atc_nomArticle ASC LIMIT 9 ;");
        return $query->result_array();
    }

     /***
     * Cette fonction permet de récupérer toutes les informations liés aux commandes présents dans la BDD de l'application.
     * -> Doit y contenir le numéro de la commande
     * -> Doit y contenir le nom et prénom du collaborateur
     * -> Doit y contenir le nom du club
     * -> Doit y contenir la date de la commande
     * -> Doit y contenir le nom et le prénom du client
     * -> Doit y contenir la description de la commande
     * -> Doit y contenir le prix de la commande
     * -> Doit y contenir le statut de la commande
     */
    public function get_all_commandes_admin()
    {
        $query =$this->db->query("SELECT cmd_numCommande, CLO.prf_nomProfil AS Nom_Collaborateur, CLO.prf_prenomProfil AS Prenom_Collaborateur, clu_nomClub, cmd_dateCommande, CLI.prf_nomProfil AS Nom_Client, CLI.prf_prenomProfil AS Prenom_Client , cmd_prixCommande, cmd_statutCommande
                                  FROM t_commande_cmd
                                  LEFT OUTER JOIN t_club_clu ON t_commande_cmd.clu_idClub = t_club_clu.clu_idClub
                                  LEFT OUTER JOIN t_collaborateur_clb ON t_club_clu.prf_idProfil = t_collaborateur_clb.prf_idProfil
                                  LEFT OUTER JOIN t_profil_prf CLO ON t_collaborateur_clb.prf_idProfil = CLO.prf_idProfil
                                  LEFT OUTER JOIN t_client_clt  ON t_commande_cmd.prf_idProfil = t_client_clt.prf_idProfil
                                  LEFT OUTER JOIN t_profil_prf CLI ON t_client_clt.prf_idProfil = CLI.prf_idProfil
                                  ORDER BY cmd_dateCommande DESC, clu_nomClub, cmd_statutCommande;");
        return $query->result_array();
    }

    /***
     * Cette fonction permet d'ajouter dans la BDD de l'application toutes les informations liés à un nouvel administrateur.
     */
    public function add_compte_admin($nom, $prenom, $pseudo, $mail, $mdp)
    {
        $query =$this->db->query("INSERT INTO t_profil_prf( prf_nomProfil, prf_prenomProfil, prf_pseudoProfil, prf_adresseMailProfil, prf_motDePasseProfil, prf_imageProfil, prf_etatProfil) 
                                  VALUES ('".$nom."','".$prenom."','".$pseudo."','".$mail."','".$mdp."','test.jpg','O');");
        return true;
    }

    /***
     * Cette fonction de récupérer l'id du compte administrateur en fonction du mail du compte.
     */
    public function get_id_compte_admin($mail)
    {
        $query =$this->db->query("SELECT prf_idProfil FROM t_profil_prf WHERE prf_adresseMailProfil = '".$mail."';");
        return $query->row();
    }

    /***
     * Cette fonction de récupérer l'id du dernier compte.
     */
    public function get_last_id_profil()
    {
        $query =$this->db->query("SELECT prf_idProfil FROM t_profil_prf ORDER BY prf_idProfil DESC LIMIT 1;");
        return $query->row();
    }

    /***
     * Cette fonction de récupérer l'id du panier existant.
     */
    public function get_last_id_panier()
    {
        $query =$this->db->query("SELECT pnr_idPanier FROM t_panier_pnr ORDER BY pnr_idPanier DESC LIMIT 1;");
        return $query->row();
    }

    /***
     * Cette fonction de récupérer l'id de la dernière commande existante.
     */
    public function get_last_id_commande()
    {
        $query =$this->db->query("SELECT cmd_idCommande FROM t_commande_cmd ORDER BY cmd_idCommande DESC LIMIT 1;");
        return $query->row();
    }

     /***
     * Cette fonction de récupérer l'id du club en fonction d'un nom de club.
     */
    public function get_id_club($nomClub)
    {
        $query =$this->db->query("SELECT clu_idClub FROM t_club_clu WHERE clu_nomClub = '".$nomClub."';");
        return $query->row();
    }

    /***
     * Cette fonction permet d'ajouter les informations issues du formulaire d'ajout d'un collaborateur. 
     * Dans ce formulaire il y a : 
     * -> Les informations liées au compte : nom, prénom, mail
     * -> Les informations liées au collaborateur : ville, numéro de téléphone, le numéro de dossier
     * -> Les informations liées au club auquel il est rataché : num du club, année du club, ville du club, description du club
     */
    public function add_compte_collaborateur($nom, $prenom, $mail, $ville, $num, $dossier, $nomClub, $anneeClub, $villeClub, $divisionClub, $descriptionClub)
    {
        $query = $this->db->query("INSERT INTO t_profil_prf(prf_nomProfil, prf_prenomProfil,  prf_adresseMailProfil, prf_etatProfil) 
                                VALUES ('".$nom."','".$prenom."','".$mail."','O');");
        $data['id'] = $this->db_model->get_id_compte_admin($mail);
        $id = (int)$data['id']->prf_idProfil;
        $query2 = $this->db->query("INSERT INTO t_collaborateur_clb(prf_idProfil, clb_villeCollaborateur, clb_numTelephone, clb_numDossier) 
                                    VALUES ('".$id."','".$ville."','".$num."','".$dossier."');");
        $query3 = $this->db->query("INSERT INTO t_club_clu ( clu_nomClub, clu_anneeClub, clu_villeClub, clu_divisionClub, clu_imageClub, clu_descriptionClub, prf_idProfil) 
                                    VALUES ('".$nomClub."','".$anneeClub."','".$villeClub."','".$divisionClub."','test.jpg','".$descriptionClub."','".$id."');");
        
        return true;
    }

    /***
     * Cette fonction permet de récupérer toutes les informations liées au profil du collaborateur en fonction de son numéro de dossier passé en paramètre
     * On y récupère les informations suivantes  :
     * -> Les informations liées au profil du collaborateur
     * -> Les informations liées au club du collaborateur
     */
    public function get_infos_collaborateur($numDossier)
    {
        $query =$this->db->query("SELECT prf_nomProfil, prf_prenomProfil, prf_imageProfil, clb_numDossier, clb_villeCollaborateur, prf_adresseMailProfil, clb_numTelephone, clu_nomClub, clu_villeClub,
                                  clu_idClub, clu_divisionClub, clu_imageClub, clu_descriptionClub, clu_anneeClub
                                  FROM t_collaborateur_clb
                                  JOIN t_profil_prf USING(prf_idProfil)
                                  JOIN t_club_clu USING(prf_idProfil)
                                  WHERE clb_numDossier = '".$numDossier."' ;");
        return $query->row();
    }

    /*** 
     * Cette fonction permet de récupérer toutes les informations liées aux commandes passées par le collaborateur sur l'application
     * Dans ces informations on y retrouve :
     * -> Les informations liées au client
     * -> La date de la commande
     * -> Le statut de la commande
     * -> La description de la commande
     * -> Le prix total de la commande
     */
    public function get_historique_commande_collaborateur($numDossier)
    {
        $query =$this->db->query("SELECT CLI.prf_nomProfil AS Nom_Client, CLI.prf_prenomProfil AS Prenom_Client, prf_adresseMailProfil, clt_adresseClient, cmd_numCommande, cmd_dateCommande, cmd_prixCommande, cmd_statutCommande
                                  FROM t_collaborateur_clb
                                  JOIN t_club_clu USING(prf_idProfil)
                                  JOIN t_commande_cmd USING(clu_idClub)
                                  JOIN t_client_clt  ON t_commande_cmd.prf_idProfil = t_client_clt.prf_idProfil
                                  JOIN t_profil_prf CLI ON t_client_clt.prf_idProfil = CLI.prf_idProfil
                                  WHERE clb_numDossier = '".$numDossier."';");

        return $query->result_array();
    }

    /***
     * Cette fonction permet de récupérer les articles disponibles pour un club en fonction du numéro de dossier lié au collaborateur
     */
    public function get_articles_dispo_club($numDossier)
    {
        $query =$this->db->query("SELECT atc_idArticle, atc_nomArticle, atc_descriptionArticle, atc_prixArticle, atc_imageArticle
                                  FROM t_collaborateur_clb
                                  JOIN t_club_clu USING(prf_idProfil)
                                  JOIN t_disponibilite_dbe USING(clu_idClub)
                                  JOIN t_article_atc USING(atc_idArticle)
                                  WHERE clb_numDossier = '".$numDossier."';");

        return $query->result_array();
    }

    /***
     * Cette fonction permet de récupérer les articles disponibles pour un club en fonction du numéro de dossier lié au collaborateur
     */
    public function get_articles_dispo_club_by_nomClub($nomClub)
    {
        $query =$this->db->query("SELECT atc_idArticle, atc_nomArticle, atc_descriptionArticle, atc_prixArticle, atc_imageArticle, tle_idTaille, tle_nomTaille
                                  FROM t_club_clu
                                  JOIN t_disponibilite_dbe USING(clu_idClub)
                                  JOIN t_article_atc USING(atc_idArticle)
                                  LEFT JOIN t_comporter_cpt USING(atc_idArticle)
                                  JOIN t_taille_tle USING(tle_idTaille)
                                  WHERE clu_nomClub = '".$nomClub."';");

        return $query->result_array();
    }

    /***
     * Cette fonction permet de récupérer tous les articles correspondant à un panier.
     * Dans cette fonction on y retrouve :
     * -> Le prix total du panier
     * -> Les articles 
     */
    public function get_articles_panier($idPanier)
    {
        $query =$this->db->query("SELECT pnr_idPanier, pnr_prixPanier, psr_quantite, atc_idArticle, t_posseder_psr.tle_idTaille AS idTaille, tle_nomTaille, atc_nomArticle, atc_descriptionArticle, atc_prixArticle, atc_imageArticle
                                  FROM t_panier_pnr
                                  JOIN t_posseder_psr USING(pnr_idPanier)
                                  JOIN t_comporter_cpt USING(atc_idArticle)
                                  JOIN t_taille_tle ON t_posseder_psr.tle_idTaille= t_taille_tle.tle_idTaille
                                  JOIN t_article_atc USING(atc_idArticle)
                                  WHERE pnr_idPanier = '".$idPanier."'
                                  GROUP BY t_posseder_psr.tle_idTaille, atc_idArticle;");

        return $query->result_array();
    }

    /***
     * Cette fonction permet de récupérer les articles issues d'une commande grâce à son numéro de commande
     */
    public function get_articles_commande($numCommande)
    {
        $query =$this->db->query("SELECT pnr_idPanier, pnr_prixPanier, psr_quantite, atc_idArticle, t_posseder_psr.tle_idTaille, tle_nomTaille, atc_nomArticle, atc_descriptionArticle, atc_prixArticle, atc_imageArticle
                                  FROM t_commande_cmd
                                  JOIN t_panier_pnr USING(pnr_idPanier)
                                  JOIN t_posseder_psr USING(pnr_idPanier)
                                  JOIN t_comporter_cpt USING(atc_idArticle)
                                  JOIN t_taille_tle ON t_posseder_psr.tle_idTaille= t_taille_tle.tle_idTaille
                                  JOIN t_article_atc USING(atc_idArticle)
                                  WHERE cmd_numCommande = '".$numCommande."'
                                  GROUP BY t_posseder_psr.tle_idTaille, atc_idArticle;");

        return $query->result_array();
    }

    /***
     * Cette fonction permet de récupérer toutes les informations liées à une commande en fonction de son numéro de commande.
     */
    public function get_commande_client($numcommande)
    {
        $query =$this->db->query("SELECT cmd_numCommande, cmd_dateCommande, cmd_statutCommande, cmd_prixCommande, prf_nomProfil, prf_prenomProfil, prf_adresseMailProfil, clt_adresseClient
                                  FROM t_commande_cmd
                                  JOIN t_client_clt USING(prf_idProfil)
                                  JOIN t_profil_prf USING(prf_idProfil)
                                  WHERE cmd_numCommande = '".$numcommande."' ;");
        return $query->row();
    }

    /***
     * Cette fonction affiche toutes les informations liées aux disponibles pour un article selon l'id de l'article 
     */
    public function get_infos_tailles($idTaille)
    {
        $query =$this->db->query("SELECT atc_nomArticle,tle_nomTaille
                                  FROM t_article_atc
                                  JOIN t_comporter_cpt USING(atc_idArticle)
                                  JOIN t_taille_tle USING(tle_idTaille)
                                  WHERE atc_idArticle = '".$idTaille."';");

        return $query->result_array();
    }

    /***
     * Cette fonction ajoute un client avec ses informations dans la BDD de l'application.
     */
    public function add_infos_client($nom, $prenom, $mail, $adresse, $password)
    {
        $query =$this->db->query("INSERT INTO t_profil_prf(prf_nomProfil, prf_prenomProfil, prf_adresseMailProfil, prf_motDePasseProfil, prf_etatProfil) 
                                  VALUES ('".$nom."','".$prenom."','".$mail."','".$password."','O');");
        $id = $this->db_model->get_last_id_profil();
        $query2 = $this->db->query("INSERT INTO t_client_clt(prf_idProfil, clt_adresseClient) 
                                    VALUES ('".$id->prf_idProfil."','".$adresse."');");

        return true;
    }

    /***
     * Cette fonction modifie les informations d'un client avec ses informations dans la BDD de l'application.
     */
    public function update_infos_client($idClient, $nom, $prenom, $mail, $adresse, $password)
    {
        $query =$this->db->query("UPDATE t_profil_prf SET prf_nomProfil='".$nom."', prf_prenomProfil='".$prenom."', prf_adresseMailProfil='".$mail."', prf_motDePasseProfil ='".$password."' 
                                  WHERE prf_idProfil = '".$idClient."';");
        $query2 = $this->db->query("UPDATE t_client_clt SET clt_adresseClient='".$adresse."' 
                                    WHERE prf_idProfil = '".$idClient."';");

        return true;
    }

    /***
     * Cette fonction ajoute un panier vierge dans la BDD de l'applciation.
     */
    
     public function create_panier($idClient,$prix)
     {
         $query =$this->db->query("INSERT INTO t_panier_pnr (pnr_prixPanier, prf_idProfil) 
                                   VALUES ('".$prix."','".$idClient."');");
         return true;
     }

    /***
     * Cette fonction ajoute un panier avec ses informations dans la BDD de l'application en fonction de l'id du client, des articles sélectionés.
     */
    
    public function create_infos_panier($idClient,$idArticle,$idTaille,$prix,$quantite)
    {
        $query =$this->db->query("INSERT INTO t_panier_pnr (pnr_prixPanier, prf_idProfil) 
                                  VALUES (('".$prix."' * '".$quantite."') ,'".$idClient."');");
        $idPanier = $this->db_model->get_last_id_panier();
        $query2=$this->db->query("INSERT INTO `t_posseder_psr`(`pnr_idPanier`, `atc_idArticle`, `tle_idTaille`, `psr_quantite`) 
                                  VALUES ('".$idPanier->pnr_idPanier."','".$idArticle."','".$idTaille."','".$quantite."');");

        
        return true;
    }

    /***
     * Cette fonction modifie les informations du panier pour ajouter l'article qui vient d'être ajouté au panier
     */
    public function add_infos_panier($idPanier,$idArticle,$idTaille,$prix,$quantite)
    {
        $query =$this->db->query("UPDATE t_panier_pnr SET pnr_prixPanier=(pnr_prixPanier+('".$prix."' * '".$quantite."')) WHERE pnr_idPanier = '".$idPanier."';");
        $query2=$this->db->query("INSERT INTO `t_posseder_psr`(`pnr_idPanier`, `atc_idArticle`, `tle_idTaille`, `psr_quantite`) 
                                  VALUES ('".$idPanier."','".$idArticle."','".$idTaille."','".$quantite."');");
        
        return true;

    }

    /***
     * Cette fonction donne le nombre de commandes effectuées dans l'application
     */
    public function get_nb_commandes()
    {
        $query= $this->db->query("SELECT COUNT(cmd_idCommande) AS NOMBRE_COMMANDE
                                  FROM t_commande_cmd;");
        return $query->row();
    }

    /***
     * Cette fonction donne le nombre de comptes présent dans l'application
     */
    public function get_nb_comptes()
    {
        $query= $this->db->query("SELECT COUNT(prf_idProfil) AS NOMBRE_COMPTE
                                  FROM t_profil_prf;");
        return $query->row();
    }

    /***
     * Cette fonction donne le nombre d'articles' présent dans l'application
     */
    public function get_nb_articles()
    {
        $query= $this->db->query("SELECT COUNT(atc_idArticle) AS NOMBRE_ARTICLE
                                  FROM t_article_atc;");
        return $query->row();
    }

    /***
     * Cette fonction donne le nombre de clubs présent dans l'application
     */
    public function get_nb_clubs()
    {
        $query= $this->db->query("SELECT COUNT(clu_idClub) AS NOMBRE_CLUB
                                  FROM t_club_clu;");
        return $query->row();
    }

    /***
     * Cette fonction récupère les informations liées au club en fonction de son nom de club.
     */
    public function get_infos_club($nomClub)
    {
        $query= $this->db->query("SELECT * FROM t_club_clu WHERE clu_nomClub = '".$nomClub."';");
        return $query->row();
    }

    /***
     * Cette fonction permet d'enregistrer une commande dans la BDD de l'application.
     */
    //TODO : Fix la description de la commande
    public function add_commande_client($numCommande, $prixCommande, $idClub, $idClient, $idPanier)
    {
        $query =$this->db->query("INSERT INTO t_commande_cmd(cmd_numCommande, cmd_dateCommande, cmd_statutCommande, cmd_prixCommande, clu_idClub, prf_idProfil, pnr_idPanier) 
                                  VALUES ('".$numCommande."', NOW(), 'En cours','".$prixCommande."','".$idClub."','".$idClient."','".$idPanier."');");

        return true;
    }

    /***
     * Cette fonction permet de récupérer le prix total du panier en fonction de l'id de ce panier.
     */
    public function get_total_panier($idPanier)
    {
        $query= $this->db->query("SELECT pnr_prixPanier FROM t_panier_pnr WHERE pnr_idPanier = '".$idPanier."';");
        return $query->row();
    }

    /***
     * Cette fonction permet de supprimer un article dans la table t_posseder_psr en fonction de l'id du panier, de l'id de l'article et l'id de la taille.
     */
    public function delete_article_panier($idPanier, $idArticle, $idTaille)
    {
        $query =$this->db->query("DELETE FROM t_posseder_psr 
                                  WHERE pnr_idPanier= '".$idPanier."' 
                                  AND atc_idArticle= '".$idArticle."'
                                  AND tle_idTaille= '".$idTaille."';");

        return true;
    }

    /***
     * Cette fonction déduit le l'article supprimé de la somme totale du panier 
     */
    public function set_total_panier($idPanier,$prix,$quantite)
    {
        $query= $this->db->query("UPDATE t_panier_pnr SET pnr_prixPanier= (pnr_prixPanier-('".$prix."' * '".$quantite."')) WHERE pnr_idPanier = '".$idPanier."';");
        return true;
    }

}
?>