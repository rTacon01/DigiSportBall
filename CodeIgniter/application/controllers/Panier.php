<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Panier extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('db_model');
        $this->load->helper('url_helper');
    }

    /***
     * Cette fonction permet d'afficher tous les articles présent dans la BDD de l'application.
     */
    public function add_article_panier($idClient,$idArticle,$idTaille,$prix,$quantite,$nomClub)
    {
        //On regarde si l'id du panier est stocké pour modifier le contenu du panier si ajout d'article
        if(isset($_SESSION['id_panier']))
        {
            //Sinon on créer un panier avec les informations ci-dessous
            $data['add_infos'] = $this->db_model->add_infos_panier($_SESSION['id_panier']->pnr_idPanier,$idArticle,$idTaille,$prix,$quantite);
            redirect(base_url()."index.php/club/get_fiche_club/".$nomClub );
        }
        else{
            //Sinon on créer un panier avec les informations ci-dessous
            $data['add_infos'] = $this->db_model->create_infos_panier($idClient,$idArticle,$idTaille,$prix,$quantite);
            //On récupère l'id du panier créé et on le stock dans une variable de session
            $_SESSION['id_panier'] = $this->db_model->get_last_id_panier();
            redirect(base_url()."index.php/club/get_fiche_club/".$nomClub );
        }
    }

    /***
     * Cette fonction permet de supprimer un article du panier et de modifier le total du panier.
     */
    public function delete_article_panier($idPanier,$idArticle,$idTaille,$prix,$quantite,$nomClub)
    {

        $data['sup_infos'] = $this->db_model->delete_article_panier($idPanier,$idArticle,$idTaille);
        $data['modif_panier'] = $this->db_model->set_total_panier($idPanier,$prix,$quantite);
        redirect(base_url()."index.php/club/get_fiche_club/".$nomClub );

    }


}